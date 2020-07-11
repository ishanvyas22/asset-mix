<?php

namespace AssetMix;

use AssetMix\Command\AssetMixCommand;
use Cake\Core\BasePlugin;

/**
 * Plugin for AssetMix
 */
class Plugin extends BasePlugin
{
    /**
     * Add console commands for the plugin.
     *
     * @param \Cake\Console\CommandCollection<mixed> $commands The command collection to update
     * @return \Cake\Console\CommandCollection<mixed>
     */
    public function console($commands)
    {
        parent::console($commands);

        $commands->add('asset_mix generate', AssetMixCommand::class);

        return $commands;
    }
}
