<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tickets

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('doc_type') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Document_number') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('output') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('destiny_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('seat') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('bus_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('reservation_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tickets as $ticket): ?>
                <tr>
                  <td><?= $this->Number->format($ticket->id) ?></td>
                  <td><?= $this->Number->format($ticket->doc_type) ?></td>
                  <td><?= $this->Number->format($ticket->Document_number) ?></td>
                  <td><?= h($ticket->output) ?></td>
                  <td><?= $ticket->has('destiny') ? $this->Html->link($ticket->destiny->name, ['controller' => 'Destinies', 'action' => 'view', $ticket->destiny->id]) : '' ?></td>
                  <td><?= $this->Number->format($ticket->seat) ?></td>
                  <td><?= $ticket->has('bus') ? $this->Html->link($ticket->bus->id, ['controller' => 'Buses', 'action' => 'view', $ticket->bus->id]) : '' ?></td>
                  <td><?= $ticket->has('reservation') ? $this->Html->link($ticket->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $ticket->reservation->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>