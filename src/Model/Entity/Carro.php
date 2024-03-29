<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carro Entity
 *
 * @property int $id
 * @property string $placa
 * @property int $estado
 *
 * @property \App\Model\Entity\Boleto[] $boleto
 */
class Carro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'placa' => true,
        'estado' => true,
        'boleto' => true
    ];
}
