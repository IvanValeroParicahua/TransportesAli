<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Destinos Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\BelongsTo $Admins
 * @property \App\Model\Table\BoletoTable|\Cake\ORM\Association\HasMany $Boleto
 * @property \App\Model\Table\ReservaTable|\Cake\ORM\Association\HasMany $Reserva
 *
 * @method \App\Model\Entity\Destino get($primaryKey, $options = [])
 * @method \App\Model\Entity\Destino newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Destino[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Destino|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destino saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destino patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Destino[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Destino findOrCreate($search, callable $callback = null, $options = [])
 */
class DestinosTable extends Table
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

        $this->setTable('destinos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Boleto', [
            'foreignKey' => 'destino_id'
        ]);
        $this->hasMany('Reserva', [
            'foreignKey' => 'destino_id'
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
            ->scalar('nombre')
            ->maxLength('nombre', 20)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->integer('estado')
            ->allowEmptyString('estado', false);

        $validator
            ->integer('costo')
            ->requirePresence('costo', 'create')
            ->allowEmptyString('costo', false);

        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));

        return $rules;
    }
}
