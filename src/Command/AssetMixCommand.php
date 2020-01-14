<?php
namespace AssetMix\Command;

use Cake\Console\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class AssetMixCommand extends Command
{
    /**
     * Directory name where all assets(js, css) files will reside.
     */
    private const ASSET_DIR_NAME = 'resources';

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

        // Copy resources directory at the project root

        // Copy webpack.mix.js file at the project root

        // Copy package.json file at the project root
    }
}
