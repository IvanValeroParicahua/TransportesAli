<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buses Model
 *
 * @property \App\Model\Table\TicketsTable|\Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Bus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bus findOrCreate($search, callable $callback = null, $options = [])
 */
class BusesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('buses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Tickets', [
            'foreignKey' => 'bus_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('enrollment')
            ->maxLength('enrollment', 7)
            ->requirePresence('enrollment', 'create')
            ->allowEmptyString('enrollment', false);

        $validator
            ->integer('status')
            ->allowEmptyString('status', false);

        return $validator;
    }
}
