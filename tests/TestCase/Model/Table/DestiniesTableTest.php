<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DestiniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DestiniesTable Test Case
 */
class DestiniesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DestiniesTable
     */
    public $Destinies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Destinies',
        'app.Admins',
        'app.Reservations',
        'app.Tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Destinies') ? [] : ['className' => DestiniesTable::class];
        $this->Destinies = TableRegistry::getTableLocator()->get('Destinies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Destinies);

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
