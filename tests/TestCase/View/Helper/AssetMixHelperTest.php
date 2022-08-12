<?php
namespace AssetMix\Test\TestCase\View\Helper;

use AssetMix\Mix;
use AssetMix\View\Helper\AssetMixHelper;
use Cake\Filesystem\Folder;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * AssetMix\View\Helper\AssetMixHelper Test Case
 */
class AssetMixHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AssetMix\View\Helper\AssetMixHelper
     */
    public $AssetMix;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();

        $webroot = TEST_APP_DIR . 'webroot';
        if (! file_exists($webroot)) {
            mkdir($webroot);
        }

        $view = new View();
        $this->AssetMix = new AssetMixHelper($view);
    }

    /**
     * {@inheritDoc}
     */
    public function tearDown()
    {
        unset($this->AssetMix);

        parent::tearDown();

        $dir = new Folder(TEST_APP_DIR . 'webroot');
        $dir->delete();

        $this->_cleanUp();

        Mix::reset();
    }

    /**
     * Copy `mix-manifest.json` file to `test_app` webroot
     *
     * @return void
     */
    protected function _copy($withVersion = false)
    {
        $sourceFilename = 'mix-manifest.json';
        $destinationFilename = 'mix-manifest.json';

        if ($withVersion) {
            $sourceFilename = 'mix-manifest-with-version.json';
        }

        if (! copy(COMPARE_PATH . $sourceFilename, WWW_ROOT . $destinationFilename)) {
            throw new \Exception('Unable to copy mix-manifest.json file');
        }
    }

    /**
     * Copy `mix-manifest.json` file to `test_app` webroot
     *
     * @return void
     */
    protected function _copyWithoutVersion()
    {
        $this->_copy(false);
    }

    /**
     * Copy `mix-manifest-with-version.json` file to `test_app` webroot
     *
     * @return void
     */
    protected function _copyWithVersion()
    {
        $this->_copy(true);
    }

    /**
     * Clean webroot directory
     *
     * @return void
     */
    protected function _cleanUp()
    {
        $files = glob(WWW_ROOT . '*');

        foreach ($files as $file) {
            if (! is_file($file)) {
                continue;
            }

            unlink($file);
        }
    }

    /**
     * Test `css()` function returns proper tag without versioning
     *
     * @return void
     */
    public function testStyleTagWithoutVersion()
    {
        $this->_copyWithoutVersion();

        $result = $this->AssetMix->css('main');

        $this->assertContains('<link', $result);
        $this->assertContains('rel="stylesheet"', $result);
        $this->assertContains('href="/css/main.css"', $result);
    }

    /**
     * Test `script()` function returns proper tag without versioning
     *
     * @return void
     */
    public function testScriptTagWithoutVersion()
    {
        $this->_copyWithoutVersion();

        $result = $this->AssetMix->script('app');

        $this->assertContains('<script', $result);
        $this->assertContains('/js/app.js', $result);
        $this->assertContains('defer="defer"', $result);
    }

    /**
     * Test `css()` function returns proper tag
     * with versioning enabled
     *
     * @return void
     */
    public function testStyleTagWithVersion()
    {
        $this->_copyWithVersion();

        $result = $this->AssetMix->css('main');

        $this->assertContains('<link', $result);
        $this->assertContains('rel="stylesheet"', $result);
        $this->assertContains('href="/css/main.css?id=9c4259d5465e35535a2a"', $result);
    }

        /**
     * Test `css()` function returns proper tag
     * with asset timestamping enabled
     *
     * @return void
     */
    public function testStyleTagWithTimestamp()
    {
        $this->_copyWithoutVersion();

        $result = $this->AssetMix->css('main.css?1660315070');

        $this->assertContains('<link', $result);
        $this->assertContains('rel="stylesheet"', $result);
        $this->assertContains('href="/css/main.css', $result);
    }

    /**
     * Test `script()` function returns proper tag
     * with versioning enabled
     *
     * @return void
     */
    public function testScriptTagWithVersion()
    {
        $this->_copyWithVersion();

        $result = $this->AssetMix->script('app');

        $this->assertContains('<script', $result);
        $this->assertContains('/js/app.js?id=f059fcadc7eba26be9ae', $result);
        $this->assertContains('defer="defer"', $result);
    }

    /**
     * Test `script()` function returns proper tag
     * with asset timestamping enabled
     *
     * @return void
     */
    public function testScriptTagWithTimestamp()
    {
        $this->_copyWithoutVersion();

        $result = $this->AssetMix->script('app.js?1660315070');

        $this->assertContains('<script', $result);
        $this->assertContains('/js/app.js', $result);
        $this->assertContains('defer="defer"', $result);
    }
}
