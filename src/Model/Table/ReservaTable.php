<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reserva Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DestinosTable|\Cake\ORM\Association\BelongsTo $Destinos
 * @property \App\Model\Table\BoletoTable|\Cake\ORM\Association\HasMany $Boleto
 * @property \App\Model\Table\VentaTable|\Cake\ORM\Association\HasMany $Venta
 *
 * @method \App\Model\Entity\Reserva get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reserva newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reserva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reserva|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reserva saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservaTable extends Table
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

        $this->setTable('reserva');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id'
        ]);
        $this->belongsTo('Destinos', [
            'foreignKey' => 'destino_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Boleto', [
            'foreignKey' => 'reserva_id'
        ]);
        $this->hasMany('Venta', [
            'foreignKey' => 'reserva_id'
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
            ->dateTime('reserva')
            ->allowEmptyDateTime('reserva');

        $validator
            ->dateTime('fecha_limit')
            ->allowEmptyDateTime('fecha_limit');

        $validator
            ->integer('cant_persona')
            ->allowEmptyString('cant_persona');

        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('estado')
            ->allowEmptyString('estado', false);

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['destino_id'], 'Destinos'));

        return $rules;
    }
}
