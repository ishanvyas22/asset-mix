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
     * {@inheritDoc}
     */
    public function console($commands)
    {
        parent::console($commands);

        $commands->add('asset_mix generate', AssetMixCommand::class);

        return $commands;
    }
}
