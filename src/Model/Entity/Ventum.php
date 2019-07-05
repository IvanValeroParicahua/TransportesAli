<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ventum Entity
 *
 * @property int $id
 * @property int $reserva_id
 * @property int $estado
 * @property int $cantidad_personas
 * @property int $precio
 *
 * @property \App\Model\Entity\Reserva $reserva
 */
class Ventum extends Entity
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
        'reserva_id' => true,
        'estado' => true,
        'cantidad_personas' => true,
        'precio' => true,
        'reserva' => true
    ];
}
