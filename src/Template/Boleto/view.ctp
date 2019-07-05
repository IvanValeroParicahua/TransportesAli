<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boleto $boleto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Boleto'), ['action' => 'edit', $boleto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Boleto'), ['action' => 'delete', $boleto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boleto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boleto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boleto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Destinos'), ['controller' => 'Destinos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Destino'), ['controller' => 'Destinos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boleto view large-9 medium-8 columns content">
    <h3><?= h($boleto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Destino') ?></th>
            <td><?= $boleto->has('destino') ? $this->Html->link($boleto->destino->id, ['controller' => 'Destinos', 'action' => 'view', $boleto->destino->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($boleto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Doc') ?></th>
            <td><?= $this->Number->format($boleto->tipo_doc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Doc') ?></th>
            <td><?= $this->Number->format($boleto->numero_doc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asiento') ?></th>
            <td><?= $this->Number->format($boleto->asiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carro Id') ?></th>
            <td><?= $this->Number->format($boleto->carro_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserva Id') ?></th>
            <td><?= $this->Number->format($boleto->reserva_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salida') ?></th>
            <td><?= h($boleto->salida) ?></td>
        </tr>
    </table>
</div>
