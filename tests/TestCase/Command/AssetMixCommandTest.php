<?php
namespace AssetMix\Test\TestCase\Command;

use Cake\Console\Command;
use AssetMix\StubsPathTrait;
use Cake\TestSuite\TestCase;
use Cake\TestSuite\ConsoleIntegrationTestTrait;

/**
 * Class to test `asset_mix` command
 */
class AssetMixCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;
    use StubsPathTrait;

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

    public function testGenerateCommandCreatesPackageJsonFileAtProjectRoot()
    {
        $this->exec('asset_mix generate');

        $contents = file_get_contents($this->getVuePackageJsonPath()['to']);

        $this->assertOutputContains('package.json file created successfully.');
        $this->assertContains('"scripts"', $contents);
        $this->assertContains('npm run development', $contents);
        $this->assertContains('axios', $contents);
        $this->assertContains('laravel-mix', $contents);
        $this->assertContains('vue', $contents);
    }

    /*
    public function testGenerateCommandCreatesWebpackMixConfigFileAtProjectRoot()
    {
        // TODO
    }

    public function testGenerateCommandCreatesResourcesDirectoryAtProjectRoot()
    {
        // TODO
    }
    */
}
