<?php
namespace AssetMix\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use AssetMix\View\Helper\MixHelper;

/**
 * AssetMix\View\Helper\MixHelper Test Case
 */
class MixHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AssetMix\View\Helper\MixHelper
     */
    public $Mix;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Mix = new MixHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mix);

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
