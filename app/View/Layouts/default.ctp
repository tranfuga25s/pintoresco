<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> :: <?php echo h( Configure::read( 'Configuracion.nombre_sitio' ) ); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css( 'demo' );
		echo $this->Html->css( 'style_common' );
		echo $this->Html->css( 'style1' );
		echo $this->Html->css( 'estilos' );
		
		echo $this->Html->script( 'jquery-1.7.2.min' );

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
	<script type="text/javascript">
	<!--
	function MM_swapImgRestore() { //v3.0
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	function MM_preloadImages() { //v3.0
	  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
	    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
	    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
	    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
	//-->
	</script>
</head>
<body onload="MM_preloadImages('/pintoresco/img/bt_barra_hover.jpg')">
	<div id="container">
		<div id="header">
			<table width="955" border="0" cellpadding="0" cellspacing="0" align="center">
				<tbody>
				  <tr>
    				<td width="850" rowspan="2" valign="top"><?php echo $this->Html->link( $this->Html->image( "encabezado1.jpg", array( 'width' => 850, 'height' => 98 ) ), '/', array( 'escape' => false ) ); ?></td>
    				<td width="105" height="51" valign="top"><?php echo $this->Html->image( "encabezado2.jpg", array( 'width' => 105, 'height' => 51 ) ); ?></td>
  				</tr>
  				<tr>
	    			<td height="47" valign="top">
	    				<?php echo $this->Html->link( $this->Html->image( "bt_sospintor.jpg", array( 'alt' => "sos pintor", 'name' => "Image13", 'width' => 105, 'height' => 47, 'border' => 0, 'id' => "Image13" ) ),
	    											  array( 'controller' => 'pintores', 'action' => 'index' ), 
	    											  array( 'escape' => false, "onmouseout" => "MM_swapImgRestore()", "onmouseover" => "MM_swapImage('Image13','','/pintoresco/img/bt_barra_hover.jpg',1)" ) ); ?>
	    			</td>
  				</tr>
  			    <tr>
				    <td height="32" colspan="2" valign="top">
				    	<div id="cssmenu">
				    		<ul>
				    			<li><?php echo $this->Html->link( '<span>Empresa</span>'          , array( 'controller' => 'pages'      , 'action' => 'empresa'   , 'administracion' => false ), array( 'escape' => false ) ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>Productos</span>'        , array( 'controller' => 'productos'  , 'action' => 'index'     , 'administracion' => false ), array( 'escape' => false )  );  ?></li>
				    			<li><?php echo $this->Html->link( '<span>¿Con qué pinto?</span>'  , array( 'controller' => 'materiales' , 'action' => 'index'     , 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>¿Con quién pinto?</span>', array( 'controller' => 'pintores'   , 'action' => 'index'     , 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>Servicios</span>'        , array( 'controller' => 'pages'      , 'action' => 'servicios' , 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>Ideas SIPP</span>'       , array( 'controller' => 'ideas'      , 'action' => 'index'     , 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>Promociones</span>'      , array( 'controller' => 'promociones', 'action' => 'index'     , 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    			<li><?php echo $this->Html->link( '<span>Contacto</span>'         , array( 'controller' => 'contacto'   , 'action' => 'formulario', 'administracion' => false ), array( 'escape' => false )  ); ?></li>
				    		</ul>		
				    	</div>
				    </td>
				  </tr>
				  <tr>
				  	<td colspan="2" bgcolor="#FFF">
				  		<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
				  	</td>
				  </tr>
				  <tr><td colspan="2"><?php echo $this->element( 'promociones' ); ?></td></tr>
				  <tr>
			        <td width="581" rowspan="2" valign="top" class="pie">
						<?php echo $this->Html->link( '<span>Empresa</span>', array( 'controller' => 'pages', 'empresa' ), array( 'escape' => false ) ); ?> &nbsp; | &nbsp;
						<?php echo $this->Html->link( '<span>Productos</span>', array( 'controller' => 'productos', 'action' => 'index' ), array( 'escape' => false )  );  ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>¿Con qué pinto?</span>', array( 'controller' => 'materiales', 'action' => 'index' ), array( 'escape' => false )  ); ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>¿Con quién pinto?</span>', array( 'controller' => 'pintores', 'action' => 'index' ), array( 'escape' => false )  ); ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>Servicios</span>', array( 'controller' => '', 'action' => 'index' ), array( 'escape' => false )  ); ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>Ideas SIPP</span>', array( 'controller' => '', 'action' => 'index' ), array( 'escape' => false )  ); ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>Promociones</span>', array( 'controller' => '', 'action' => 'index' ), array( 'escape' => false )  ); ?> &nbsp; | &nbsp;
				    	<?php echo $this->Html->link( '<span>Contacto</span>', array( 'controller' => '', 'action' => 'index' ), array( 'escape' => false )  ); ?>  &nbsp; | &nbsp;
			          <br />
			          
			          Sucursal Salta 2974 - Tel.: (0341) 436 1389  |  Sucursal Buenos Aires esq San Luis - Tel.: (0341) 426 5068 / 426 6573<br />
			          Sucursal Catamarca esq Santiago - Tel.: (0341) 156 753164<br />
			          <strong>email:</strong><?php echo $this->Html->link( Configure::read( 'Configuracion.email_contacto' ), "mailto:".Configure::read( 'Configuracion.email_contacto' ) ); ?></td>
			          <td width="87" align="center" valign="middle" class="pie_seguinos" rowspan="2">
			          	Seguinos en <?php echo $this->Html->link( $this->Html->image( "logo_face.png", array( 'width' => 26, 'height' => 26 ) ), 'http://www.facebook.com/sipp.pinturerias', array( 'escape' => false ) ); ?></td>
			        </tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="publicidad">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1880233918301202";
			/* Desarrollo */
			google_ad_slot = "0058508055";
			google_ad_width = 468;
			google_ad_height = 60;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
	<?php //echo $this->element( 'sql_dump' ); ?>
</body>
</html>
