<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarroTable Test Case
 */
class CarroTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarroTable
     */
    public $Carro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Carro',
        'app.Boleto'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Carro') ? [] : ['className' => CarroTable::class];
        $this->Carro = TableRegistry::getTableLocator()->get('Carro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carro);

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
}
