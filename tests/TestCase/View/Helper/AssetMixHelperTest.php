<?php
namespace AssetMix\Test\TestCase\View\Helper;

use Cake\View\View;
use Cake\TestSuite\TestCase;
use AssetMix\View\Helper\AssetMixHelper;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        $this->_compareBasePath = APP . 'tests' . DS . 'comparisons' . DS;

        parent::setUp();

        $view = new View();
        $this->AssetMix = new AssetMixHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AssetMix);

        parent::tearDown();
    }

    /**
     * Test script function returns proper tag without versioning
     *
     * @return void
     */
    public function testScriptTagWithoutVersion()
    {
        $this->AssetMix->css('main');
    }
}
