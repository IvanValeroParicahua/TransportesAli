<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carro Model
 *
 * @property \App\Model\Table\BoletoTable|\Cake\ORM\Association\HasMany $Boleto
 *
 * @method \App\Model\Entity\Carro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carro findOrCreate($search, callable $callback = null, $options = [])
 */
class CarroTable extends Table
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

        $this->setTable('carro');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Boleto', [
            'foreignKey' => 'carro_id'
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
            ->scalar('placa')
            ->maxLength('placa', 7)
            ->requirePresence('placa', 'create')
            ->allowEmptyString('placa', false);

        $validator
            ->integer('estado')
            ->allowEmptyString('estado', false);

        return $validator;
    }
}
