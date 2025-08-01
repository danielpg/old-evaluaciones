<?php ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >	
<title><?php echo $title_for_layout?></title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php echo $html->css("superfish.css");	 ?>
<?php echo $html->css("superfish-navbar.css");	 ?>
<?php echo $html->css("jquery.modal.min.css");	 ?>
<?php echo $html->css("spectrum.css");	 ?>

<?php echo $javascript->link(array('jquery.min','jquery.form','jquery-ui-1.9.2.custom.min','notify','jquery.modal.min','spectrum')); ?>
<?php echo $javascript->link(array('superfish')); ?>

<script type="text/javascript">
	function f_view_hist(regid){
		$("#view_reg").load('<?php echo Router::url('/registros/historial_view') ?>/'+ regid + "?rand=" + Math.random());
		$('#view_reg').dialog("open");
		return false;
	}

</script>
 <script>
/*
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3C;Ant',
		nextText: 'Sig&#x3E;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
		$.datepicker.setDefaults($.datepicker.regional['es']);*/

function highlight(obj){
	$(obj).parent().find('label').removeClass('qsel');
	$(obj).addClass('qsel');
}


   </script>
<style>

body{background:#0769ad;font-family:Arial;text-align:left;font-size:12px  }
h2{text-align:left;font-weight:bold}
form{width:100%}

table{width:100%;border:0px;}
table td{text-align:left;font-size:13px}
.thh tr:hover td {
    background: #FCFE59 !important;color:black;
}
.thh{color:black;}
td:first-child { padding:7px }
.altrow{background:#f4f4f4;}

.qsel{font-weight:Bold;text-transform:uppercase;color:blue}
input[type='radio']{cursor:pointer}
label{cursor:pointer;padding:6px 3px}
.instrubox{text-align:left;border:2px solid black;font-size:13px;padding:5px;color:#333}
.footbu{margin-top:20px;margin-bottom:30px}

#topnav{
background-color: rgba(0, 0, 0, 0.18);
border-radius: 10px 10px 0 0;
border-right: 1px solid rgba(2, 2, 2, 0.28);
border-left: 1px solid rgba(2, 2, 2, 0.28);
border-top: 1px solid rgba(250, 250, 250, 0.27);
box-shadow: 0 0 5px rgba(1, 1, 1, 0.7);
max-width:1040px;
height:50px;
display:block;
margin: 0 auto;
}

#wrapper{
background-color: #fff;
box-shadow: -3px 0 5px -3px rgba(1, 1, 1, 0.87), 3px 0 5px -3px rgba(1, 1, 1, 0.87);
padding: 20px 0;
border-top: 1px solid #333;
border-radius: 0 0 10px 10px;
max-width:1000px;
margin: 0 auto;
padding:20px
}
body{text-align:center;padding:20px;color: #333;}

.tnrgt{float:right;font-size:13px;color:white;text-decoration:underline;margin-right:20px;margin-top:14px}
.tnlft{float:left;font-size:20px;color:White;margin-left:20px;margin-top:11px}

.qbutton{ cursor:pointer;background-color: rgb(30, 105, 170);
border-radius: 5px;
border-right: 1px solid rgba(2, 2, 2, 0.28);
border-left: 1px solid rgba(2, 2, 2, 0.28);
border-top: 1px solid rgba(250, 250, 250, 0.27);
box-shadow: 0 0 1px rgba(1, 1, 1, 0.7);
color: white;
padding: 6px 17px; }
.qbutton:hover{ font-weight:bold}

.sf-menu, .sf-menu *{font-size:13px}
.sf-menu li {   background: #06568e;}
.notifyjs-corner{width:500px}
.notifyjs-bootstrap-error{font-size:14px;padding:20px}
.notifyjs-bootstrap-info{font-size:14px;padding:20px}
.notifyjs-bootstrap-warn{font-size:14px;padding:20px}
.notifyjs-bootstrap-success{font-size:14px;padding:20px}

.index table thead{background:green;}
.index table thead th{padding:6px 3px;color:white;text-align:left}
.index table thead th a {color:white}
.index table thead th input {font-size:12px;width:100%;padding:2px}
.index table .actions a{ color:#333;margin-right:10px}
.index .paging .disabled{opacity:0.1}

dl {line-height: 2em;margin: 0em 0em;width: 680px;text-align:left}
dl .altrow {background: #f4f4f4;}
dt {font-weight: bold;padding-left: 4px;vertical-align: top;	width: 280px;}
dd {margin-left: 16em;margin-top: -2em;vertical-align: top;font-weight: normal;}

.view h2{float:left}
.view ul{float:right;list-style-type:none}
.view ul li{float:left;border:1px solid black;margin-left:10px}

.view ul li a{ cursor:pointer;background-color: rgb(30, 105, 170);
border-radius: 5px;
border-right: 1px solid rgba(2, 2, 2, 0.28);
border-left: 1px solid rgba(2, 2, 2, 0.28);
border-top: 1px solid rgba(250, 250, 250, 0.27);
box-shadow: 0 0 1px rgba(1, 1, 1, 0.7);
color: white;
padding: 6px 17px;text-decoration:none;color:white }
.view ul li a:hover{ font-weight:bold}
.paging{font-size:15px;margin-top:15px}
.modal{max-width: 800px !important;}
#toptitle{color:white;font-size:28px;text-align:center;margin-bottom:10px}

.input{ text-align:left;margin-top:15px;}
.input label{font-size:14px;text-align:left;}
.input input,.input textarea{width:400px;display:block;padding:4px}
.input select{text-align:left;display:block}
.view .submit{text-align:left;margin-top:20px}
.index table tbody tr:hover{background:yellow}
.error-message{color:red;font-size:14px;font-weight:bold;}

table.conductual{border:1px solid  #c6c6c6;}
table.conductual td{border:1px solid #c6c6c6;border-top:0;border-right:0;padding:1px}
h5 {    font-size: 14px;}
</style>
</head>
<body>

	<div id="toptitle">Centro de Evaluaciones - Administrador</div>
	<div id="topnav">
		<div class="tnlft">	

			<ul class="sf-menu">
				<li><a href="#">Resultados</a>
					<ul>
						<li><?php echo $this->Html->link("Listado", array('controller' => 'resultados', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Usuarios", array('controller' => 'users', 'action' => 'index')); ?></li>
					</ul>								
				</li>
				<?php if(Credentials::get("__credentials.Admin.role_id") == 1): ?>
				<li><a href="#">Preguntas</a>
					<ul>
						<li><?php echo $this->Html->link("Conductual", array('controller' => 'conductual', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Laboral", array('controller' => 'laboral', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Personalidad", array('controller' => 'personalidad', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Eynseck", array('controller' => 'eynseck', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Vocacional", array('controller' => 'vocacional', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Raven", array('controller' => 'clavesraven', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("TPT", array('controller' => 'tepetes', 'action' => 'index')); ?></li>
					</ul>
				</li>
				<li><a href="#">Definiciones</a>
					<ul>
						<li><?php echo $this->Html->link("Nombre de Tests", array('controller' => 'exams', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Clave Colores", array('controller' => 'coloref', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Vocaciones", array('controller' => 'vocaciones', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Temperamento", array('controller' => 'settings', 'action' => 'index/1' )); ?></li>
						<li><?php echo $this->Html->link("Colores", array('controller' => 'settings', 'action' => 'index/4' )); ?></li>
						<li><?php echo $this->Html->link("TPT Secciones", array('controller' => 'secciones', 'action' => 'index' )); ?></li>
					</ul>
				</li>
				<li><a href="#">Administrador</a>
					<ul>
						<li><?php echo $this->Html->link("Evaluadores", array('controller' => 'admins', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link("Usuarios", array('controller' => 'users', 'action' => 'index_admin')); ?></li>
					</ul>	
				</li>								
				<?php endif; ?>
			</ul>



		</div>
		<div class="tnrgt">	
			<?php //echo Credentials::get('__credentials.User.name') ?> 
			<a style="color:white;" href="<?php echo $html->url(array('controller'=>'authentication','action'=>'logout')) ?>">Cerrar Sesiòn</a>
		</div>
		<div style="clear:both"></div>
	</div>
	<div id="wrapper">

	<?php echo $content_for_layout ?>

	</div>


	<script type="text/javascript">
	<?php $textflash = strip_tags($this->Session->flash());$this->Session->delete('Message.flash'); ?>
	<?php if (!empty($textflash)): ?> $.notify("<?php echo $textflash ?>" , { position:"top center",className:"info" , autoHideDelay : 6000 }); <?php endif; ?>

	<?php 
	 if($messages = $session->read('Message.multiFlash')):
	foreach($messages as $k=>$v): 
		if($v["class"] == "warning")$v["class"] = "warn";
		if($v["class"] == "notice")$v["class"] = "info";
		?>
		
		$.notify("<?php echo $v["message"] ?> ", { position:"top center",className:"<?php echo $v["class"] ?>" , autoHideDelay : 6000 }); 
	<?php endforeach;
		endif;	
	$session->delete('Message.multiFlash'); 
	?>	
	</script>

<!--div style="background:white;color:black;margin-top:100px">
	<?php //  echo str_replace("LEFT JOIN","<br />LEFT JOIN",$this->element('sql_dump')); ?>
</div-->	

</body>
</html>
