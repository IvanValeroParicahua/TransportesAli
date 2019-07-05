<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva[]|\Cake\Collection\CollectionInterface $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Destinos'), ['controller' => 'Destinos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Destino'), ['controller' => 'Destinos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Venta'), ['controller' => 'Venta', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ventum'), ['controller' => 'Venta', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reserva index large-9 medium-8 columns content">
    <h3><?= __('Reserva') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_limit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cant_persona') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destino_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reserva as $reserva): ?>
            <tr>
                <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->name, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                <td><?= h($reserva->reserva) ?></td>
                <td><?= h($reserva->fecha_limit) ?></td>
                <td><?= $this->Number->format($reserva->cant_persona) ?></td>
                <td><?= $this->Number->format($reserva->id) ?></td>
                <td><?= $reserva->has('destino') ? $this->Html->link($reserva->destino->id, ['controller' => 'Destinos', 'action' => 'view', $reserva->destino->id]) : '' ?></td>
                <td><?= $this->Number->format($reserva->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
