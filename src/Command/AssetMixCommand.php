<?php
namespace AssetMix\Command;

use Cake\Console\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use AssetMix\StubsPathTrait;
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
    private const ASSET_DIR_NAME = 'resources';

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
            ->setDescription(__('Auto generate configuration files, resources directory'))
            ->addOption('dir', [
                'short' => 'd',
                'help' => __('Directory name to create'),
                'default' => self::ASSET_DIR_NAME,
            ]);

        return $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        // debug($args->getOption('dir'));

        // Copy package.json file at the project root
        $this->copyPackageJsonFile($io);

        // Copy resources directory at the project root

        // Copy webpack.mix.js file at the project root
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
}
