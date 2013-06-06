<?php
$this->set( 'title_for_layout', "Inicio" );
?>
<table width="100%">
	<tbody>
		<tr>
			<td><?php echo $this->element( 'sucursales' ); ?></td>
	    </tr>
	    <tr>
			<td style="background-color: #ea7e2d;"><?php echo $this->element( 'convenios' ); ?></td>
		</tr>
	</tbody>
</table>