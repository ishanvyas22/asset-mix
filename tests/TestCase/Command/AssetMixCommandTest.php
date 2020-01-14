<?php
namespace AssetMix\Test\TestCase\Command;

use Cake\Console\Command;
use Cake\TestSuite\TestCase;
use Cake\TestSuite\ConsoleIntegrationTestTrait;

/**
 * Class to test `asset_mix` command
 */
class AssetMixCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    public function setUp()
    {
        parent::setUp();

        $this->useCommandRunner();
    }

    public function testAssetMixGenerateCommandReturnsSuccessCode()
    {
        $this->exec('asset_mix generate --help');

        $this->assertExitCode(Command::CODE_SUCCESS);
        $this->assertOutputContains('Auto generate configuration files, resources directory');
    }

    public function testAssetMixGenerateCommandWorks()
    {
        $this->exec('asset_mix generate');

        $this->assertExitCode(Command::CODE_SUCCESS);
    }

    public function testGenerateCommandCreatesPackageJsonFileAtProjectRoot()
    {
        // TODO
    }

    public function testGenerateCommandCreatesWebpackMixConfigFileAtProjectRoot()
    {
        // TODO
    }

    public function testGenerateCommandCreatesResourcesDirectoryAtProjectRoot()
    {
        // TODO
    }
}
