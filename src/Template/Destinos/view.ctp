<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Destino $destino
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Destino'), ['action' => 'edit', $destino->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Destino'), ['action' => 'delete', $destino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $destino->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Destinos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Destino'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserva'), ['controller' => 'Reserva', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reserva', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="destinos view large-9 medium-8 columns content">
    <h3><?= h($destino->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($destino->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($destino->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Costo') ?></th>
            <td><?= $this->Number->format($destino->costo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin Id') ?></th>
            <td><?= $this->Number->format($destino->admin_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($destino->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Boleto') ?></h4>
        <?php if (!empty($destino->boleto)): ?>
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
            <?php foreach ($destino->boleto as $boleto): ?>
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
        <h4><?= __('Related Reserva') ?></h4>
        <?php if (!empty($destino->reserva)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Reserva') ?></th>
                <th scope="col"><?= __('Fecha Limit') ?></th>
                <th scope="col"><?= __('Cant Persona') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Destino Id') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($destino->reserva as $reserva): ?>
            <tr>
                <td><?= h($reserva->users_id) ?></td>
                <td><?= h($reserva->reserva) ?></td>
                <td><?= h($reserva->fecha_limit) ?></td>
                <td><?= h($reserva->cant_persona) ?></td>
                <td><?= h($reserva->id) ?></td>
                <td><?= h($reserva->destino_id) ?></td>
                <td><?= h($reserva->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reserva', 'action' => 'view', $reserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reserva', 'action' => 'edit', $reserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reserva', 'action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
