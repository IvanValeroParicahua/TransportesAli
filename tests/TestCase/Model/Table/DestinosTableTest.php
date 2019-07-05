<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DestinosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DestinosTable Test Case
 */
class DestinosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DestinosTable
     */
    public $Destinos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Destinos',
        'app.Admins',
        'app.Boleto',
        'app.Reserva'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Destinos') ? [] : ['className' => DestinosTable::class];
        $this->Destinos = TableRegistry::getTableLocator()->get('Destinos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Destinos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
