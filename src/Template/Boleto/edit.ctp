<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boleto $boleto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $boleto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $boleto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Boleto'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Destinos'), ['controller' => 'Destinos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Destino'), ['controller' => 'Destinos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boleto form large-9 medium-8 columns content">
    <?= $this->Form->create($boleto) ?>
    <fieldset>
        <legend><?= __('Edit Boleto') ?></legend>
        <?php
            echo $this->Form->control('tipo_doc');
            echo $this->Form->control('numero_doc');
            echo $this->Form->control('salida');
            echo $this->Form->control('destino_id', ['options' => $destinos]);
            echo $this->Form->control('asiento');
            echo $this->Form->control('carro_id');
            echo $this->Form->control('reserva_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
