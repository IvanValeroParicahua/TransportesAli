<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ventum $ventum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ventum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ventum->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Venta'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reserva'), ['controller' => 'Reserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reserva', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venta form large-9 medium-8 columns content">
    <?= $this->Form->create($ventum) ?>
    <fieldset>
        <legend><?= __('Edit Ventum') ?></legend>
        <?php
            echo $this->Form->control('reserva_id', ['options' => $reserva]);
            echo $this->Form->control('estado');
            echo $this->Form->control('cantidad_personas');
            echo $this->Form->control('precio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
