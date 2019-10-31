<?php
namespace AssetMix;

use Exception;

/**
 * Paths related to mix files, generate by laravel mix.
 */
class Mix
{
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path Path of the asset file.
     * @param string $manifestDirectory Custom manifest directory.
     * @return string
     *
     * @throws \Exception
     */
    public function __invoke($path, $manifestDirectory = '')
    {
        static $manifests = [];
        $publicPath = env('DOCUMENT_ROOT');

        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (file_exists($publicPath . $manifestDirectory . '/hot')) {
            $url = rtrim(file_get_contents($publicPath . $manifestDirectory . '/hot'));
            if (starts_with($url, ['http://', 'https://'])) {
                return str_after($url, ':') . $path;
            }

            return "//localhost:8765{$path}";
        }

        $manifestPath = $publicPath . $manifestDirectory . '/mix-manifest.json';
        if (! isset($manifests[$manifestPath])) {
            if (! file_exists($manifestPath)) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];
        if (! isset($manifest[$path])) {
            throw new Exception("Unable to locate AssetMix file: {$path}.");
        }

        return $manifestDirectory . $manifest[$path];
    }
}
