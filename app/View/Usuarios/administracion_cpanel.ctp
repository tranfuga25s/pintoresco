<!-- Panel de administración -->
<?php $this->set( 'title_for_layout', 'Panel de control' ); ?>
<h1>Bienvenido, <span><?php echo AuthComponent::user( 'nombre' ); ?></span>!</h1>
<p>Que desea hacer hoy?</p>
<table>
	<tbody>
		<tr>
			<td colspan="3">
				<h2>Datos</h2>
				<ul class="dash">
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/productos-icono.png' )
				                .'<span>Categorias</span>',
				                array( 'controller' => 'categorias', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de categorias' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/productos-icono.png' )
				                .'<span>Productos</span>',
				                array( 'controller' => 'productos', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de productos' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/marca-icono.jpg' )
				                .'<span>Marcas</span>',
				                array( 'controller' => 'marcas', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de marcas declaradas' ) ); ?></li>
   				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/marca-icono.jpg' )
				                .'<span>Tipos</span>',
				                array( 'controller' => 'tipos', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de tipos de productos' ) ); ?></li>

				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/marca-icono.jpg' )
				                .'<span>Materiales</span>',
				                array( 'controller' => 'materiales', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de materiales declaradas' ) ); ?></li>
                   <li><?php echo $this->Html->link(
                                $this->Html->image( 'assets/marca-icono.jpg' )
                                .'<span>Superficies</span>',
                                array( 'controller' => 'superficies', 'action' => 'index', 'plugin' => false ),
                                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de superficies declaradas' ) ); ?></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<h2>Pintores</h2>
				<ul class="dash">
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/pintor-icono.jpeg' )
				                .'<span>Pintores</span>',
				                array( 'controller' => 'pintores', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de pintores' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/obra-icono.jpeg' )
				                .'<span>Obras</span>',
				                array( 'controller' => 'obras', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de pintores' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/marca-icono.jpg' )
				                .'<span>Especialidades</span>',
				                array( 'controller' => 'especialidades', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de marcas declaradas' ) ); ?></li>
				</ul>
			</td>
			<td>
				<h2>Convenios</h2>
				<ul class="dash">
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/institucion-icono.jpeg' )
				                .'<span>Organismos</span>',
				                array( 'controller' => 'organismos', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de organismos' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/convenios-icono.png' )
				                .'<span>Convenios</span>',
				                array( 'controller' => 'convenios', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de convenios' ) ); ?></li>
				</ul>
			</td>
			<td>
				<h2>Promociones</h2>
				<ul class="dash">
				    <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/20_48x48.png' )
				                .'<span>Promociones</span>',
				                array( 'controller' => 'promociones', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Listado de promociones' ) ); ?></li>
					<li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/5_48x48.png' )
				                .'<span>Ideas SIPP</span>',
				                array( 'plugin' => false, 'controller' => 'ideas', 'action ' => 'index' ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Ideas SIPP' ) ); ?></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<h2>Sistema</h2>
				<ul class="dash">
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/16_48x48.png' )
				                .'<span>Usuarios</span>',
				                array( 'controller' => 'usuarios', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Usuarios' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/user_group-icon.gif' )
				                .'<span>Grupos</span>',
				                array( 'controller' => 'grupos', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Grupos' ) ); ?></li>
				<!--   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/5_48x48.png' )
				                .'<span>Permisos</span>',
				                array( 'plugin' => 'acl', 'controller' => 'acos'),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Permisos del sistema' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/14_48x48.png' )
				                .'<span>Estadisticas</span>',
				                array( 'controller' => 'estadisticas', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Visor de estadisticas' ) ); ?></li> -->
				</ul>
			</td>
			<td colspan="2">
				<h2>Configuraci&oacute;n</h2>
				<ul class="dash">
				   <!-- <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/notification-icon.png' )
				                .'<span>Notificaciones</span>',
				                '#',
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Todavía no implementado' ) ); ?></li>
				   <li>	<?php echo $this->Html->link(
				   				$this->Html->image( 'cabecera.png' )
				   				.'<span>Auditoria</span>',
				   			     array( 'plugin' => 'audit_log', 'controller' => 'audit_log', 'action' => 'index' ),
				   			     array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Acciones realizadas en el sistema' ) ); ?></li>-->
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/configuration-icon.png' )
				                .'<span>Páginas estáticas</span>',
				                array( 'controller' => 'pages', 'action' => 'index', 'plugin' => false ),
				                array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Editar páginas estaticas del sistema' ) ); ?></li>
				   <li><?php echo $this->Html->link(
				                $this->Html->image( 'assets/icons/25_48x48.png' )
				                .'<span>Ver sitio</span>',
				                '/', array( 'escape' => false, 'class' => 'tooltip', 'title' => 'Volver al sitio', 'target' => '_blank' ) ); ?></li>

				</ul>
			</td>
		</tr>
	</tbody>
</table>