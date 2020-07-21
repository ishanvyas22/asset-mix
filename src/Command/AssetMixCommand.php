<?php
declare(strict_types=1);

namespace AssetMix\Command;

use AssetMix\StubsPathTrait;
use AssetMix\Utility\FileUtility;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class AssetMixCommand extends Command
{
    use StubsPathTrait;

    /**
     * Filesystem utility object
     *
     * @var \AssetMix\Utility\FileUtility
     */
    private $filesystem;

    /**
     * Directory name where all assets(js, css) files will reside.
     */
    public const ASSETS_DIR_NAME = 'assets';

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        $this->filesystem = new FileUtility();
    }

    /**
     * @inheritDoc
     */
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser
            ->setDescription('Auto generate configuration files, assets directory')
            ->addOption('dir', [
                'short' => 'd',
                'help' => __('Directory name to create'),
                'default' => self::ASSETS_DIR_NAME,
            ]);

        return $parser;
    }

    /**
     * @inheritDoc
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        // Copy package.json file at the project root
        $this->copyPackageJsonFile($io);

        // Copy webpack.mix.js file at the project root
        $this->copyWebpackMixJsFile($io);

        // Copy resources directory at the project root
        $this->copyAssetsDirectory($args, $io);

        return null;
    }

    /**
     * Copy `package.json` file in project root
     *
     * @param \Cake\Console\ConsoleIo $io Console input/output
     * @return void
     */
    private function copyPackageJsonFile($io)
    {
        $path = $this->getVuePackageJsonPath();

        $this->filesystem->copy($path['from'], $path['to']);

        $io->success(__('\'package.json\' file created successfully.'));
    }

    /**
     * Copy `webpack.mix.js` file in project root
     *
     * @param \Cake\Console\ConsoleIo $io Console input/output
     * @return void
     */
    private function copyWebpackMixJsFile($io)
    {
        $path = $this->getVueWebpackMixJsPath();

        $this->filesystem->copy($path['from'], $path['to']);

        $io->success(__('\'webpack.mix.js\' file created successfully.'));
    }

    /**
     * Create, copy `assets` directory to project of the root
     *
     * @param \Cake\Console\Arguments $args Arguments
     * @param \Cake\Console\ConsoleIo $io Console input/output
     * @return void
     */
    private function copyAssetsDirectory($args, $io)
    {
        $dirName = $args->getOption('dir');
        $assetPath = ROOT . DS . $dirName;
        $stubsPaths = $this->getVueAssetsDirPaths();

        if ($this->filesystem->exists($assetPath)) {
            // Ask if they want to overwrite existing directory with stubs
        }

        $this->filesystem->mkdir($assetPath);
        $this->filesystem->recursiveCopy($stubsPaths['from_assets'], $assetPath);

        $io->success(__(sprintf('\'%s\' directory created successfully.', $dirName)));
    }
}
