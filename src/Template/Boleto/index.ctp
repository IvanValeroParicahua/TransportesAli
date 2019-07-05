<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boleto[]|\Cake\Collection\CollectionInterface $boleto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Boleto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Destinos'), ['controller' => 'Destinos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Destino'), ['controller' => 'Destinos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boleto index large-9 medium-8 columns content">
    <h3><?= __('Boleto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_doc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_doc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destino_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carro_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boleto as $boleto): ?>
            <tr>
                <td><?= $this->Number->format($boleto->id) ?></td>
                <td><?= $this->Number->format($boleto->tipo_doc) ?></td>
                <td><?= $this->Number->format($boleto->numero_doc) ?></td>
                <td><?= h($boleto->salida) ?></td>
                <td><?= $boleto->has('destino') ? $this->Html->link($boleto->destino->id, ['controller' => 'Destinos', 'action' => 'view', $boleto->destino->id]) : '' ?></td>
                <td><?= $this->Number->format($boleto->asiento) ?></td>
                <td><?= $this->Number->format($boleto->carro_id) ?></td>
                <td><?= $this->Number->format($boleto->reserva_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $boleto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $boleto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $boleto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boleto->id)]) ?>
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
