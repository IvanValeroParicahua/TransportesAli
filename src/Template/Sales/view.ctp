<section class="content-header">
  <h1>
    Sale
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Reservation') ?></dt>
            <dd><?= $sale->has('reservation') ? $this->Html->link($sale->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $sale->reservation->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($sale->id) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $this->Number->format($sale->status) ?></dd>
            <dt scope="row"><?= __('People') ?></dt>
            <dd><?= $this->Number->format($sale->people) ?></dd>
            <dt scope="row"><?= __('Price') ?></dt>
            <dd><?= $this->Number->format($sale->price) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
