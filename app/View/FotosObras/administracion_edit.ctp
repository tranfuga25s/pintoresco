<?php
$this->set( 'title_for_layout', "Editar imagen de una obra" );
?>
<div id="acciones">
    <?php echo $this->Html->link( 'Eliminar', array( 'action' => 'delete', $this->data['FotosObra']['id_foto_obra'] ), null, 'Está seguro que desea eliminar esta imagen?' ); ?>
    <?php echo $this->Html->Link( 'Lista de imagenes', array( 'action' => 'index', $this->data['Obra']['id_obra'] ) ); ?>
</div>
<br />
<div class="form">
    <?php echo $this->Form->create( 'FotosObra', array( 'action' => 'edit' ) );
          echo $this->Form->hidden( 'id_foto_obra' );
          echo $this->Form->hidden( 'obra_id' );
    ?>
    <fieldset>
        <legend><h2>Editar informacion de una imagen</h2></legend>
        <table>
            <tbody>
                <tr>
                    <td rowspan="2" style="border: 1px solid gray;"><?php echo $this->Html->image( 'obras'.DS.$this->data['FotosObra']['dir'].DS.$this->data['FotosObra']['path'], array( 'width' => 200) ); ?></td>
                    <td><?php echo $this->Form->input( 'titulo' ); ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input( 'descripcion' ); ?></td>
                </tr>
            </tbody>
        </table>
        <?php echo $this->Form->end( 'Guardar' ); ?>
    </fieldset>
</div>
