<?php
echo $this->Html->css('demo', null, array( 'inline' => false ) );
echo $this->Html->css('style_common', null, array( 'inline' => false ) );
echo $this->Html->css('style1', null, array( 'inline' => false ) );
?>
<table width="744" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <!--DWLayoutTable-->
        <tr bgcolor="#FFFFFF">
          <td width="744" height="257" valign="top" bgcolor="#FFFFFF">
            <div class="container">
              <div class="view view-first">
              <?php echo $this->Html->image( "sucu1.png" ); ?>
                <div class="mask">
                  <h2>Salta 2974</h2>
                  <p>en esta sucursal usted podra encontrar todo lo necesario para renovar su casa de una pintada</p>
                  <?php echo $this->Html->link( 'Contacto', array( 'controller' => 'contacto', 'action' => 'formulario' ), array( 'class' => "info" ) ); ?>
                </div>
            </div>
            <div class="view view-first">
              <?php echo $this->Html->image( "sucu2.png" ); ?>
              <div class="mask">
                <h2>Bs. As. esq. San Luis</h2>
                    <p>en esta sucursal usted podra encontrar todo lo necesario para renovar su casa de una pintada</p>
                    <?php echo $this->Html->link( 'Contacto', array( 'controller' => 'contacto', 'action' => 'formulario' ), array( 'class' => "info" ) ); ?>
              </div>
            </div>  
            <div class="view view-first">
                <?php echo $this->Html->image( "sucu3.png" ); ?>
                    <div class="mask">
                      <h2>Catamarca esq. Santiago</h2>
                        <p>en esta sucursal usted podra encontrar todo lo necesario para renovar su casa de una pintada</p>
                        <?php echo $this->Html->link( 'Contacto', array( 'controller' => 'contacto', 'action' => 'formulario' ), array( 'class' => "info" ) ); ?>
                    </div>
                </div>  
      		</div>    
      </td>
    </tr>
</table>