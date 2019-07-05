<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Boleto Model
 *
 * @property \App\Model\Table\DestinosTable|\Cake\ORM\Association\BelongsTo $Destinos
 * @property \App\Model\Table\CarrosTable|\Cake\ORM\Association\BelongsTo $Carros
 * @property \App\Model\Table\ReservasTable|\Cake\ORM\Association\BelongsTo $Reservas
 *
 * @method \App\Model\Entity\Boleto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Boleto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Boleto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Boleto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Boleto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Boleto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Boleto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Boleto findOrCreate($search, callable $callback = null, $options = [])
 */
class BoletoTable extends Table
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

        $this->setTable('boleto');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Destinos', [
            'foreignKey' => 'destino_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Carros', [
            'foreignKey' => 'carro_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Reservas', [
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
            ->integer('tipo_doc')
            ->requirePresence('tipo_doc', 'create')
            ->allowEmptyString('tipo_doc', false);

        $validator
            ->integer('numero_doc')
            ->requirePresence('numero_doc', 'create')
            ->allowEmptyString('numero_doc', false);

        $validator
            ->dateTime('salida')
            ->requirePresence('salida', 'create')
            ->allowEmptyDateTime('salida', false);

        $validator
            ->integer('asiento')
            ->requirePresence('asiento', 'create')
            ->allowEmptyString('asiento', false);

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
        $rules->add($rules->existsIn(['destino_id'], 'Destinos'));
        $rules->add($rules->existsIn(['carro_id'], 'Carros'));
        $rules->add($rules->existsIn(['reserva_id'], 'Reservas'));

        return $rules;
    }
}
