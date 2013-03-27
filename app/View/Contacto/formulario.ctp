<?php $this->set( 'title_for_layout', "Contactese con nosotros" ); ?>
<h1>Contacto directo</h1>
<div class="contacto">
		Utilice el siguiente formulario para enviarnos su consulta:
		<?php
			echo $this->Form->create( 'contacto', array( 'url' => '/contacto/enviar' ) );
			echo $this->Form->input( 'nombre', array( 'label' => "Su nombre" ) );
			echo $this->Form->input( 'email', array( 'label' => "Su e-mail" ) );
			echo $this->Form->input( 'motivo', array( 'label' => "Motivo", 
						'options' => array( 'Consultas' => 'Consultas',
											'Asesoramiento' => 'Asesoramiento',
											'Sugerencias' => 'Sugerencias',
											'Presupuesto' => 'Presupuesto',
											'Soy Pintor' => 'Soy Pintor' ) 
			) );
			echo $this->Form->input( 'texto', array( 'label' => "Texto del mensaje:", 'type' => 'textarea' ) );
			echo $this->Recaptcha->display();
			echo $this->Form->end( 'Enviar' );
		?>	
</div>