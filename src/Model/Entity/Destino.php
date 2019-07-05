<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Destino Entity
 *
 * @property string $nombre
 * @property int $estado
 * @property int $costo
 * @property int $admin_id
 * @property int $id
 *
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Boleto[] $boleto
 * @property \App\Model\Entity\Reserva[] $reserva
 */
class Destino extends Entity
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
        'nombre' => true,
        'estado' => true,
        'costo' => true,
        'admin_id' => true,
        'admin' => true,
        'boleto' => true,
        'reserva' => true
    ];
}
