<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ventum $ventum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ventum'), ['action' => 'edit', $ventum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ventum'), ['action' => 'delete', $ventum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ventum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venta'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ventum'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserva'), ['controller' => 'Reserva', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reserva', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venta view large-9 medium-8 columns content">
    <h3><?= h($ventum->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $ventum->has('reserva') ? $this->Html->link($ventum->reserva->id, ['controller' => 'Reserva', 'action' => 'view', $ventum->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ventum->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($ventum->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Personas') ?></th>
            <td><?= $this->Number->format($ventum->cantidad_personas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($ventum->precio) ?></td>
        </tr>
    </table>
</div>
