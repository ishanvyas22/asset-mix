<?php
declare(strict_types=1);

namespace AssetMix\Test\TestCase\Command;

use AssetMix\StubsPathTrait;
use AssetMix\Utility\FileUtility;
use Cake\Console\Command;
use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * Class to test `asset_mix` command
 */
class AssetMixCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;
    use StubsPathTrait;

    /**
     * Filesystem utility object
     *
     * @var FileUtility
     */
    private $filesystem;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->useCommandRunner();

        $this->filesystem = new FileUtility();
    }

    public function testAssetMixGenerateCommandReturnsSuccessCode()
    {
        $this->exec('asset_mix generate --help');

        $this->assertExitCode(Command::CODE_SUCCESS);
        $this->assertOutputContains('Auto generate configuration files, assets directory');
    }

    public function testGenerateCommandCreatesPackageJsonFileAtProjectRoot()
    {
        $this->exec('asset_mix generate');

        $contents = file_get_contents($this->getVuePackageJsonPath()['to']);

        $this->assertOutputContains("'package.json' file created successfully.");
        $this->assertStringContainsString('"scripts"', $contents);
        $this->assertStringContainsString('npm run development', $contents);
        $this->assertStringContainsString('axios', $contents);
        $this->assertStringContainsString('laravel-mix', $contents);
        $this->assertStringContainsString('vue', $contents);
    }

    public function testGenerateCommandCreatesWebpackMixConfigFileAtProjectRoot()
    {
        $this->exec('asset_mix generate');

        $contents = file_get_contents($this->getVueWebpackMixJsPath()['to']);

        $this->assertOutputContains("'webpack.mix.js' file created successfully.");
        $this->assertStringContainsString('mix.setPublicPath', $contents);
        $this->assertStringContainsString('assets/js/app.js', $contents);
        $this->assertStringContainsString(".setPublicPath('./webroot')", $contents);
    }

    public function testGenerateCommandCreatesAssetsDirectoryAtProjectRoot()
    {
        $paths = $this->getVueAssetsDirPaths();

        $this->exec('asset_mix generate');

        $this->commonDirectoryExistsAssertions($paths);
    }

    public function testGenerateCommandCreatesDirectoryWithCustomNameFromAssetsDirectory()
    {
        $customDirName = 'resources';
        $paths = $this->getVueAssetsDirPaths($customDirName);

        $this->exec(sprintf('asset_mix generate --dir=%s', $customDirName));

        $this->commonDirectoryExistsAssertions($paths);
    }

    private function commonDirectoryExistsAssertions($paths)
    {
        $appJsContents = file_get_contents($paths['to_assets_js_app']);
        $appSassContents = file_get_contents($paths['to_assets_sass_app']);

        $this->assertDirectoryExists($paths['to_assets']);
        $this->assertDirectoryExists($paths['to_assets_css']);
        $this->assertDirectoryExists($paths['to_assets_js']);
        $this->assertDirectoryExists($paths['to_assets_js_components']);
        $this->assertDirectoryExists($paths['to_assets_sass']);
        $this->assertFileExists($paths['to_assets_sass_app']);
        $this->assertStringContainsString("import Vue from 'vue';", $appJsContents);
        $this->assertStringContainsString('$primary: grey', $appSassContents);
    }

    /**
     * @inheritDoc
     */
    public function tearDown(): void
    {
        parent::tearDown();

        $this->filesystem->delete([
            ASSET_MIX_ROOT . DS . 'package.json',
            ASSET_MIX_ROOT . DS . 'webpack.mix.js',
            ASSET_MIX_ROOT . DS . 'assets',
            ASSET_MIX_ROOT . DS . 'resources',
        ]);
    }
}
