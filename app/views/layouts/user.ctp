<?php ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >	
<title>Spectrum - Centro de Evaluaciones</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo $html->css("jquery.modal.min.css");	 ?>
<?php //echo $this->Html->css('cake.generic'); ?>

<?php echo $javascript->link(array('jquery.min','jquery.form','jquery-ui-1.9.2.custom.min','notify','jquery.modal.min')); ?>
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

function radio_validation(obj,total_questions) {
	emptycounter = 0;
	//total_questions = 57;
	lastid = 0;
	nros = "";

	for(j = 1; j <= total_questions; j++){
		if($('input[name=p' + j + ']:checked').val()== undefined){
			emptycounter++;
			lastid = j;
			nros += " #" + j + ", ";
		}
	}


	if(emptycounter == 1){
		$.notify("Te falta responder la pregunta #" + lastid , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
		return false;
	} else if(emptycounter > 8){
		$.notify("Te falta responder " + emptycounter + " preguntas", { position:"top center",className:"error", autoHideDelay : 6000 }); //error, warn, info
		return false;
	}else if(emptycounter > 0){
		$.notify("Te falta responder las preguntas " + nros.substr(0 , nros.length - 2 ), { position:"top center",className:"error", autoHideDelay : 6000 }); //error, warn, info
		return false;
	}
}

function tpt_radio_validation(obj,total_questions) {
	emptycounter = 0;
	//total_questions = 57;
	lastid = 0;
	nros = "";
	lastname = "";

	$(".thh input[type=radio]").each(function() {
		cname = $( this ).attr("name");
		if(cname != lastname){
			lastname = cname;
			//nros += " #" + $( this ).parent().prev().prev().html()+ ", ";			
			if($('input[name=' + cname + ']:checked').val()== undefined){
				emptycounter++;
				lastid =  cname.substring(1);
				nros += " #" + cname.substring(1) + ", ";
			}

		}

	});

	if(emptycounter == 1){
		$.notify("Te falta responder la pregunta #" + lastid , { position:"top center",className:"error" , autoHideDelay : 6000 }); //error, warn, info
		return false;
	} else if(emptycounter > 8){
		$.notify("Te falta responder " + emptycounter + " preguntas", { position:"top center",className:"error", autoHideDelay : 6000 }); //error, warn, info
		return false;
	}else if(emptycounter > 0){
		$.notify("Te falta responder las preguntas " + nros.substr(0 , nros.length - 2 ), { position:"top center",className:"error", autoHideDelay : 6000 }); //error, warn, info
		return false;
	}
}

   </script>
<style>
.notifyjs-bootstrap-error{font-size:14px;padding:20px}
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

.qsel{font-weight:Bold;text-transform:uppercase;color:blue;font-size:15px}
input[type='radio']{cursor:pointer}
label{cursor:pointer;padding:6px 3px}
.instrubox{text-align:left;border:2px solid black;font-size:14px;padding:5px;color:#333}
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
body{text-align:center;color: #333;}

.tnrgt{float:right;font-size:13px;color:white;margin-right:20px;margin-top:14px}
.tnrgt a{ text-decoration:underline;}
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
.notifyjs-corner{width:500px}
.notifyjs-bootstrap-error{font-size:14px;padding:20px}
.notifyjs-bootstrap-info{font-size:14px;padding:20px}
.notifyjs-bootstrap-warn{font-size:14px;padding:20px}
.notifyjs-bootstrap-success{font-size:14px;padding:20px}
</style>
</head>
<body>

	<?php echo $html->image("konfia.jpeg",array("width" => "200px","style" => "border-radius:5px;margin-bottom:10px")); ?>
	<div id="topnav">
	<div class="tnlft">	
	Centro de Evaluaciones
	</div>
	<div class="tnrgt">	
	(<?php echo Credentials::get('__credentials.User.name') ?>) 
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


</body>
</html>
