<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reserva'), ['action' => 'edit', $reserva->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserva'), ['action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserva'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Destinos'), ['controller' => 'Destinos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Destino'), ['controller' => 'Destinos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venta'), ['controller' => 'Venta', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ventum'), ['controller' => 'Venta', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reserva view large-9 medium-8 columns content">
    <h3><?= h($reserva->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->name, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destino') ?></th>
            <td><?= $reserva->has('destino') ? $this->Html->link($reserva->destino->id, ['controller' => 'Destinos', 'action' => 'view', $reserva->destino->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cant Persona') ?></th>
            <td><?= $this->Number->format($reserva->cant_persona) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reserva->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($reserva->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= h($reserva->reserva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Limit') ?></th>
            <td><?= h($reserva->fecha_limit) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Boleto') ?></h4>
        <?php if (!empty($reserva->boleto)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tipo Doc') ?></th>
                <th scope="col"><?= __('Numero Doc') ?></th>
                <th scope="col"><?= __('Salida') ?></th>
                <th scope="col"><?= __('Destino Id') ?></th>
                <th scope="col"><?= __('Asiento') ?></th>
                <th scope="col"><?= __('Carro Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reserva->boleto as $boleto): ?>
            <tr>
                <td><?= h($boleto->id) ?></td>
                <td><?= h($boleto->tipo_doc) ?></td>
                <td><?= h($boleto->numero_doc) ?></td>
                <td><?= h($boleto->salida) ?></td>
                <td><?= h($boleto->destino_id) ?></td>
                <td><?= h($boleto->asiento) ?></td>
                <td><?= h($boleto->carro_id) ?></td>
                <td><?= h($boleto->reserva_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Boleto', 'action' => 'view', $boleto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Boleto', 'action' => 'edit', $boleto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Boleto', 'action' => 'delete', $boleto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boleto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Venta') ?></h4>
        <?php if (!empty($reserva->venta)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col"><?= __('Cantidad Personas') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reserva->venta as $venta): ?>
            <tr>
                <td><?= h($venta->id) ?></td>
                <td><?= h($venta->reserva_id) ?></td>
                <td><?= h($venta->estado) ?></td>
                <td><?= h($venta->cantidad_personas) ?></td>
                <td><?= h($venta->precio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Venta', 'action' => 'view', $venta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Venta', 'action' => 'edit', $venta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Venta', 'action' => 'delete', $venta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
