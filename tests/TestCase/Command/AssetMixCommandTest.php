<?php
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
     * {@inheritDoc}
     */
    public function setUp()
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
        $this->assertOutputContains('The preset/scaffolding type (bootstrap, vue, react');
        $this->assertOutputContains('choices: bootstrap|vue|react|inertia-vue');
    }

    public function testGenerateCommandCreatesPackageJsonFileAtProjectRoot()
    {
        $this->exec('asset_mix generate');

        $packageJsonContents = file_get_contents($this->getVuePackageJsonPath()['to']);

        $this->assertOutputContains("'package.json' file created successfully.");
        $this->assertContains('"scripts"', $packageJsonContents);
        $this->assertContains('npm run development', $packageJsonContents);
        $this->assertContains('axios', $packageJsonContents);
        $this->assertContains('laravel-mix', $packageJsonContents);
        $this->assertContains('vue', $packageJsonContents);
    }

    public function testGenerateCommandCreatesWebpackMixConfigFileAtProjectRoot()
    {
        $this->exec('asset_mix generate');

        $contents = file_get_contents($this->getVueWebpackMixJsPath()['to']);

        $this->assertOutputContains("'webpack.mix.js' file created successfully.");
        $this->assertContains('mix.setPublicPath', $contents);
        $this->assertContains('assets/js/app.js', $contents);
        $this->assertContains(".setPublicPath('./webroot')", $contents);
        $this->assertContains(".sass('assets/sass/app.scss', 'webroot/css')", $contents);
    }

    public function testGenerateCommandCreatesAssetsDirectoryAtProjectRoot()
    {
        $paths = $this->getVueAssetsDirPaths();

        $this->exec('asset_mix generate');

        $this->commonDirectoryExistsAssertions($paths);

        $this->assertContains(
            "import Vue from 'vue';",
            file_get_contents($paths['to_assets_js_app'])
        );
        $this->assertContains(
            '$primary: grey',
            file_get_contents($paths['to_assets_sass_app'])
        );
    }

    public function testGenerateCommandCreatesDirectoryWithCustomNameFromAssetsDirectory()
    {
        $customDirName = 'resources';
        $paths = $this->getVueAssetsDirPaths($customDirName);

        $this->exec(sprintf('asset_mix generate --dir=%s', $customDirName));

        $this->commonDirectoryExistsAssertions($paths);

        $this->assertContains(
            "import Vue from 'vue';",
            file_get_contents($paths['to_assets_js_app'])
        );
        $this->assertContains(
            '$primary: grey',
            file_get_contents($paths['to_assets_sass_app'])
        );

        $webpackMixFileContents = file_get_contents($this->getVueWebpackMixJsPath()['to']);
        $this->assertContains(
            sprintf(".js('%s/js/app.js', 'webroot/js')", $customDirName),
            $webpackMixFileContents
        );
    }

    public function testGenerateCommandCreatesBootstrapScaffolding()
    {
        $directoryPaths = $this->getBootstrapAssetsDirPaths();
        $packagePaths = $this->getBootstrapPackageJsonPath();

        $this->exec('asset_mix generate bootstrap');

        $this->commonDirectoryExistsAssertions($directoryPaths);
        $this->assertContains(
            '"bootstrap": "',
            file_get_contents($packagePaths['to'])
        );
        $this->assertContains(
            '"jquery": "',
            file_get_contents($packagePaths['to'])
        );
        $this->assertContains(
            "require('bootstrap');",
            file_get_contents($directoryPaths['to_assets_js_app'])
        );
        $this->assertContains(
            "@import '~bootstrap/scss/bootstrap';",
            file_get_contents($directoryPaths['to_assets_sass_app'])
        );
    }

    public function testGenerateCommandCreatesReactScaffolding()
    {
        $directoryPaths = $this->getReactAssetsDirPaths();
        $packagePaths = $this->getReactPackageJsonPath();

        $this->exec('asset_mix generate react');

        $webpackMixJsContents = file_get_contents($this->getReactWebpackMixJsPath()['to']);
        $packageJsonContents = file_get_contents($packagePaths['to']);

        $this->commonDirectoryExistsAssertions($directoryPaths);
        $this->assertContains(
            '"react": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"react-dom": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"bootstrap": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"jquery": "',
            $packageJsonContents
        );
        $this->assertContains(
            "require('./components/Greet');",
            file_get_contents($directoryPaths['to_assets_js_app'])
        );
        $this->assertContains(
            "@import '~bootstrap/scss/bootstrap';",
            file_get_contents($directoryPaths['to_assets_sass_app'])
        );
        $this->assertContains(".react('assets/js/app.js', 'webroot/js')", $webpackMixJsContents);
    }

    public function testGenerateCommandCreatesInertiaVueScaffolding()
    {
        $directoryPaths = $this->getInertiaVueAssetsDirPaths();
        $packagePaths = $this->getInertiaVuePackageJsonPath();

        $this->exec('asset_mix generate inertia-vue');

        $webpackMixJsContents = file_get_contents($this->getInertiaVueWebpackMixJsPath()['to']);
        $packageJsonContents = file_get_contents($packagePaths['to']);

        $this->commonDirectoryExistsAssertions($directoryPaths);
        $this->assertContains(
            '"@inertiajs/inertia": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"@inertiajs/inertia-vue": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"vue": "',
            $packageJsonContents
        );
        $this->assertContains(
            '"vue-meta": "',
            $packageJsonContents
        );
        $this->assertContains(
            "import { InertiaApp } from '@inertiajs/inertia-vue'",
            file_get_contents($directoryPaths['to_assets_js_app'])
        );
        $this->assertContains("vue$: 'vue/dist/vue.runtime.esm.js", $webpackMixJsContents);
    }

    private function commonDirectoryExistsAssertions($paths)
    {
        $this->assertDirectoryExists($paths['to_assets']);
        $this->assertDirectoryExists($paths['to_assets_css']);
        $this->assertDirectoryExists($paths['to_assets_js']);
        $this->assertDirectoryExists($paths['to_assets_sass']);
        $this->assertFileExists($paths['to_assets_sass_app']);

        if (isset($paths['to_assets_js_components'])) {
            $this->assertDirectoryExists($paths['to_assets_js_components']);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
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
