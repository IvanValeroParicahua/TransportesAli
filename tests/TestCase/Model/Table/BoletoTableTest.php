<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoletoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoletoTable Test Case
 */
class BoletoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BoletoTable
     */
    public $Boleto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Boleto',
        'app.Destinos',
        'app.Carros',
        'app.Reservas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boleto') ? [] : ['className' => BoletoTable::class];
        $this->Boleto = TableRegistry::getTableLocator()->get('Boleto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Boleto);

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
