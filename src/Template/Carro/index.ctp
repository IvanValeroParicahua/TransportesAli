<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro[]|\Cake\Collection\CollectionInterface $carro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Carro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boleto'), ['controller' => 'Boleto', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Boleto'), ['controller' => 'Boleto', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carro index large-9 medium-8 columns content">
    <h3><?= __('Carro') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carro as $carro): ?>
            <tr>
                <td><?= $this->Number->format($carro->id) ?></td>
                <td><?= h($carro->placa) ?></td>
                <td><?= $this->Number->format($carro->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $carro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carro->id)]) ?>
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
