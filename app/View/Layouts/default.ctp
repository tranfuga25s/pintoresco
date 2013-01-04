<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('pinturesco');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Sistema de Pinturería</h1>
		</div>
		<div id="menu">
			<ul>
				<li><?php echo $this->Html->link( 'Inicio', '/' ); ?></li>
				<li><?php echo $this->Html->link( '¿Con que pinto?', array( 'controller' => 'productos', 'action' => 'index' ) ); ?></li>
				<li><?php echo $this->Html->link( '¿Con quien pinto?', array( 'controller' => 'pintores', 'action' => 'index' ) ); ?></li>
				<li><?php echo $this->Html->link( 'Ideas decoración', array( 'controller' => '', 'action' => 'index' ) ); ?></li>
				<li><?php echo $this->Html->link( 'Convenios', array( 'controller' => 'convenios', 'action' => 'index' ) ); ?></li>
				<li><?php echo $this->Html->link( 'Contacto', array( 'controller' => 'contacto', 'action' => 'formulario' ) ); ?></li>
				<li><?php echo $this->Html->link( 'La empresa', array( 'controller' => 'pages', 'empresa' ) ); ?></li>				
			</ul>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
				  echo $this->Html->link(
                    $this->Html->image( 'tr.logo.png', array( 'alt' => "TR Sistemas Informaticos Integrados", 'border' => '0' ) ),
                    'http://www.bscomputacion.org/',
                    array( 'target' => '_blank', 'escape' => false )
                );
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
