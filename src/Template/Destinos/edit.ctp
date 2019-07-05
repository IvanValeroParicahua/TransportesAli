<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Destino $destino
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $destino->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $destino->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Destinos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserva'), ['controller' => 'Reserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reserva', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="destinos form large-9 medium-8 columns content">
    <?= $this->Form->create($destino) ?>
    <fieldset>
        <legend><?= __('Edit Destino') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('estado');
            echo $this->Form->control('costo');
            echo $this->Form->control('admin_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
