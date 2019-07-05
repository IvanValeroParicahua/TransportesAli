<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venta Model
 *
 * @property \App\Model\Table\ReservaTable|\Cake\ORM\Association\BelongsTo $Reserva
 *
 * @method \App\Model\Entity\Ventum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ventum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ventum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ventum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ventum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ventum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ventum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ventum findOrCreate($search, callable $callback = null, $options = [])
 */
class VentaTable extends Table
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

        $this->setTable('venta');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reserva', [
            'foreignKey' => 'reserva_id',
            'joinType' => 'INNER'
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
            ->integer('estado')
            ->allowEmptyString('estado', false);

        $validator
            ->integer('cantidad_personas')
            ->requirePresence('cantidad_personas', 'create')
            ->allowEmptyString('cantidad_personas', false);

        $validator
            ->integer('precio')
            ->requirePresence('precio', 'create')
            ->allowEmptyString('precio', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['reserva_id'], 'Reserva'));

        return $rules;
    }
}
