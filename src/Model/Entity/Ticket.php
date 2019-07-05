<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int $doc_type
 * @property int $Document_number
 * @property \Cake\I18n\FrozenDate $output
 * @property int $destiny_id
 * @property int $seat
 * @property int $bus_id
 * @property int $reservation_id
 *
 * @property \App\Model\Entity\Destiny $destiny
 * @property \App\Model\Entity\Bus $bus
 * @property \App\Model\Entity\Reservation $reservation
 */
class Ticket extends Entity
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
        'doc_type' => true,
        'Document_number' => true,
        'output' => true,
        'destiny_id' => true,
        'seat' => true,
        'bus_id' => true,
        'reservation_id' => true,
        'destiny' => true,
        'bus' => true,
        'reservation' => true
    ];
}
