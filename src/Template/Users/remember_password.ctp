<?php

?>
<nav class ="large-3 medium -4 columns" id= "actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?=__('Actions')?></li>
			<li><?=$this->Html->link(__('New User'),['controller'->'Users','action'->'add']) ?></li>
		</ul>
 </nav>
 <div class ="users form large-9 medium-8 columns content">
 			<?=$this->Form->create($user)?>
 			<fieldset>
 				<legend><?=__('Remember Password')?></legend>
 				<?php
 						echo $this->Form->input('email');
 				?>
 			</fieldset>
 				<?= $this->Form->button(__('Submit')) ?>
 				<?= $this->Form->end()?>
 </div>