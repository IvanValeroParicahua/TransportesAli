<h2>Sistema de Login<h2>
<div>
		<p>
				Hola<?php echo $nome;?>!
		</p>
		<p>
				Para proceder a la recuperacion de su clave, de click al link que se encuentra abajo, en la pantalla de cambio de clave, digite su nueva clave.
				<br/>
				<?php
						$root = pathinfo($_SERVER['HTTP_REFERER']);
						$link =$root['dirname'] . DS . 'change password?h=' .$hash . '&mail=$mail';
						echo $this->Html->link('Redefinir clave de usuario',$link);
				?>
			</p>
</div>