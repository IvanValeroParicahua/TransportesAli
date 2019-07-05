<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Carro'), ['action' => 'edit', $carro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Carro'), ['action' => 'delete', $carro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carro'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carro view large-9 medium-8 columns content">
    <h3><?= h($carro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Placa') ?></th>
            <td><?= h($carro->placa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($carro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $this->Number->format($carro->estado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Boleto') ?></h4>
        <?php if (!empty($carro->boleto)): ?>
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
            <?php foreach ($carro->boleto as $boleto): ?>
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
</div>
