<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Boleto Entity
 *
 * @property int $id
 * @property int $tipo_doc
 * @property int $numero_doc
 * @property \Cake\I18n\FrozenTime $salida
 * @property int $destino_id
 * @property int $asiento
 * @property int $carro_id
 * @property int $reserva_id
 *
 * @property \App\Model\Entity\Destino $destino
 * @property \App\Model\Entity\Carro $carro
 * @property \App\Model\Entity\Reserva $reserva
 */
class Boleto extends Entity
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
        'tipo_doc' => true,
        'numero_doc' => true,
        'salida' => true,
        'destino_id' => true,
        'asiento' => true,
        'carro_id' => true,
        'reserva_id' => true,
        'destino' => true,
        'carro' => true,
        'reserva' => true
    ];
}
