<?php

namespace AssetMix;

use Cake\Core\BasePlugin;
use AssetMix\Command\AssetMixCommand;

/**
 * Plugin for AssetMix
 */
class Plugin extends BasePlugin
{
    public function console($commands)
    {
        parent::console($commands);

        $commands->add('asset_mix generate', AssetMixCommand::class);

        return $commands;
    }
}
