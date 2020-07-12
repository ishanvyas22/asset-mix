<?php
namespace AssetMix;

use AssetMix\Command\AssetMixCommand;

trait StubsPathTrait
{
    /**
     * Returns base directory path of vue stubs path
     *
     * @return string
     */
    public function getBaseVueStubsPath()
    {
        return ASSET_MIX_ROOT . DS . 'stubs' . DS . 'vue' . DS;
    }

    /**
     * Returns `package.json` file paths for vue
     *
     * @return array<string>
     */
    public function getVuePackageJsonPath()
    {
        $packageJsonPath = $this->getBaseVueStubsPath() . 'package.json';

        return [
            'from' => $packageJsonPath,
            'to' => ROOT . DS . basename($packageJsonPath),
        ];
    }

    /**
     * Returns `webpack.mix.js` file patha for vue
     *
     * @return array<string>
     */
    public function getVueWebpackMixJsPath()
    {
        $webpackConfigPath = $this->getBaseVueStubsPath() . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => basename($webpackConfigPath),
        ];
    }

    /**
     * Returns paths for `assets` directory files
     *
     * @param string|null $dirname Custom directory name.
     * @return array<string>
     */
    public function getVueAssetsDirPaths($dirname = null)
    {
        if ($dirname === null) {
            $dirname = AssetMixCommand::ASSETS_DIR_NAME;
        }

        $assetsDirPath = $this->getBaseVueStubsPath() . $dirname;

        return [
            'from_assets' => $assetsDirPath,
            'to_assets' => basename($assetsDirPath),
            'to_assets_css' => basename($assetsDirPath) . DS . 'css',
            'to_assets_js' => basename($assetsDirPath) . DS . 'js',
            'to_assets_js_app' => basename($assetsDirPath) . DS . 'js' . DS . 'app.js',
            'to_assets_js_components' => basename($assetsDirPath) . DS . 'js' . DS . 'components',
            'to_assets_sass' => basename($assetsDirPath) . DS . 'sass',
            'to_assets_sass_app' => basename($assetsDirPath) . DS . 'sass' . DS . 'app.sass',
        ];
    }
}
