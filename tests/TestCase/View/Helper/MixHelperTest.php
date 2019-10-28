<?php
namespace AssetMix\Test\TestCase\View\Helper;

use Cake\View\View;
use Cake\TestSuite\TestCase;
use AssetMix\View\Helper\AssetMixHelper;

/**
 * AssetMix\View\Helper\AssetMixHelper Test Case
 */
class MixHelperTest extends TestCase
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
