<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserva Entity
 *
 * @property int|null $users_id
 * @property \Cake\I18n\FrozenTime|null $reserva
 * @property \Cake\I18n\FrozenTime|null $fecha_limit
 * @property int|null $cant_persona
 * @property int $id
 * @property int $destino_id
 * @property int $estado
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Destino $destino
 * @property \App\Model\Entity\Boleto[] $boleto
 * @property \App\Model\Entity\Ventum[] $venta
 */
class Reserva extends Entity
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
        'users_id' => true,
        'reserva' => true,
        'fecha_limit' => true,
        'cant_persona' => true,
        'destino_id' => true,
        'estado' => true,
        'user' => true,
        'destino' => true,
        'boleto' => true,
        'venta' => true
    ];
}
