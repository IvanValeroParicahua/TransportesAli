<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int|null $users_id
 * @property \Cake\I18n\FrozenDate|null $reservation
 * @property \Cake\I18n\FrozenDate|null $deadline
 * @property int|null $enrollment
 * @property int $id
 * @property int $destiny_id
 * @property int $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Destiny $destiny
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Reservation extends Entity
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
        'reservation' => true,
        'deadline' => true,
        'enrollment' => true,
        'destiny_id' => true,
        'status' => true,
        'user' => true,
        'destiny' => true,
        'sales' => true,
        'tickets' => true
    ];
}
