<?php
namespace AssetMix\Command;

use AssetMix\StubsPathTrait;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Symfony\Component\Filesystem\Filesystem;

class AssetMixCommand extends Command
{
    use StubsPathTrait;

    /**
     * Filesystem object
     *
     * @var Filesystem
     */
    private $filesystem;

    /**
     * Directory name where all assets(js, css) files will reside.
     */
    public const ASSETS_DIR_NAME = 'assets';

    /**
     * {@inheritDoc}
     */
    public function initialize()
    {
        $this->filesystem = new Filesystem();
    }

    /**
     * {@inheritDoc}
     */
    protected function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser
            ->setDescription(__('Auto generate configuration files, assets directory'))
            ->addOption('dir', [
                'short' => 'd',
                'help' => __('Directory name to create'),
                'default' => self::ASSETS_DIR_NAME,
            ]);

        return $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        // Copy package.json file at the project root
        $this->copyPackageJsonFile($io);

        // Copy webpack.mix.js file at the project root
        $this->copyWebpackMixJsFile($io);

        // Copy resources directory at the project root
        $this->copyAssetsDirectory($args, $io);
    }

    /**
     * Copy `package.json` file in project root
     *
     * @param ConsoleIo $io Console input/output
     * @return void
     */
    private function copyPackageJsonFile($io)
    {
        $path = $this->getVuePackageJsonPath();

        $this->filesystem->copy($path['from'], $path['to']);

        $io->success(__('package.json file created successfully.'));
    }

    /**
     * Copy `webpack.mix.js` file in project root
     *
     * @param ConsoleIo $io Console input/output
     * @return void
     */
    private function copyWebpackMixJsFile($io)
    {
        $path = $this->getVueWebpackMixJsPath();

        $this->filesystem->copy($path['from'], $path['to']);

        $io->success(__('webpack.mix.js file created successfully.'));
    }

    /**
     * Create, copy `assets` directory to project of the root
     *
     * @param Arguments $args Arguments
     * @param ConsoleIo $io Console input/output
     * @return void
     */
    private function copyAssetsDirectory($args, $io)
    {
        $assetPath = APP . DS . $args->getOption('dir');
        $stubsPaths = $this->getVueAssetsDirPaths();

        if ($this->filesystem->exists($assetPath)) {
            // Ask if they want to overwrite existing directory with stubs
        }

        $this->filesystem->mkdir($assetPath, 0776);

        $this->filesystem->mirror($stubsPaths['from_assets'], $assetPath);
    }
}
