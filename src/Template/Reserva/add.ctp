<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reserva'), ['action' => 'index']) ?></li>
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
<div class="reserva form large-9 medium-8 columns content">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Add Reserva') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('reserva', ['empty' => true]);
            echo $this->Form->control('fecha_limit', ['empty' => true]);
            echo $this->Form->control('cant_persona');
            echo $this->Form->control('destino_id', ['options' => $destinos]);
            echo $this->Form->control('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
