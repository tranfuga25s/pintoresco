<?php
$this->pageTitle = "Nuestros convenios";
?>
<?php echo $this->Html->image( 'panoramica_promociones.jpg' ); ?>
<div class="convenios index">
    <div class="titulos">Nuestros convenios</div>
    <?php
    foreach ($convenios as $convenio): ?>
    <div class="convenio">
        <span class="sub_titulos"><?php echo h($convenio['Organismo']['nombre']); ?>&nbsp;</span><br />
        <div class="txt_general">V&aacute;lido desde <?php echo date( 'd/m/Y', strtotime( $convenio['Convenio']['fecha_inicio'] ) ); ?>
                            hasta <?php echo date( 'd/m/Y', strtotime( $convenio['Convenio']['fecha_fin'] ) ); ?></div>
        <div class="txt_general"><b>Descuento aplicable:&nbsp;</b><?php echo h($convenio['Convenio']['descuento']); ?>%&nbsp;</div>
        <div class="txt_general"><b>Forma de pago:&nbsp;</b><?php echo $convenio['Convenio']['forma_pago']; ?>&nbsp;</div>
        <div class="txt_general"><b>Documentacion a presentar:&nbsp;</b><?php echo $convenio['Convenio']['documentacion']; ?>&nbsp;</div>
    </div>
<?php endforeach; ?>
</div>
<div class="paging">
    <?php
        if( $this->Paginator->hasPrev() )
          echo $this->Paginator->prev(' < Anterior ', array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ' | '));
        if( $this->Paginator->hasNext() )
           echo $this->Paginator->next( ' Siguiente > ', array(), null, array('class' => 'next disabled'));
    ?>
</div>