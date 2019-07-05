<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Reservations

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
                  <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('reservation') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('enrollment') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('destiny_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($reservations as $reservation): ?>
                <tr>
                  <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->name, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                  <td><?= h($reservation->reservation) ?></td>
                  <td><?= h($reservation->deadline) ?></td>
                  <td><?= $this->Number->format($reservation->enrollment) ?></td>
                  <td><?= $this->Number->format($reservation->id) ?></td>
                  <td><?= $reservation->has('destiny') ? $this->Html->link($reservation->destiny->name, ['controller' => 'Destinies', 'action' => 'view', $reservation->destiny->id]) : '' ?></td>
                  <td><?= $this->Number->format($reservation->status) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class'=>'btn btn-danger btn-xs']) ?>
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