<?php ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<?php //echo $html->css("jquery.loadingModal.min.css");	 ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php echo $javascript->link(array('jquery.min','jquery.form')); ?>


	<title>Centro de Evaluaciones</title>
	

	
<style>
body{
font-size:11px;
font-family: Verdana, Arial, sans-serif;
margin:0px;
background:#408eda
}
img{border:0px}
a,a:VISITED,a:ACTIVE,a:FOCUS,a:LINK {
text-decoration:none;
font-weight: bold;
color:white;
}

input{border:1px solid gray;-moz-border-radius: 5px;border-radius:8px;padding:4px;margin-bottom:10px;margin-top:3px}
input{border:1px solid #d3d3d5;border-radius:3px;}
.login_label{    color: #373737;    font-size: 12px;}

body.loading {    overflow: hidden;  }
body.loading .cusmodal {    display: block;}
.cusmodal {
    display:    none;
    position:   fixed;
    z-index:    100000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: gray;
	opacity:0.4
}

.cusmodal:before {
  position: absolute;
  top: 47% ;
  left: 48% ;
  content: "\f110";
  font-family: 'FontAwesome';
  font-size: 60px;
  animation: fa-spin 2s infinite linear;
  color: white;
  /*background-image:url('../images/isc.logo18.png');*/
  /*background: white;*/
  width: 60px;
  height: 60px;
    
}

#login_errors{
color: white;
font-weight: bold;
background: #bf1c1c;
text-align: center;
margin: 10px;
font-size: 14px;
border-radius: 4px;
padding: 6px;
}
.yatienes{color:white;text-decoration:underline;margin-top:20px;font-size:14px}
#flashMessage{color:white;background:#a11414;padding:5px;font-size:15px;text-align:center}
.adlink{color:white;bottom:3px;right:3px}
.qdlink{position:absolute;color:white;bottom:3px;right:3px}
.qdlink a{font-weight:normal;font-size:10px}
</style>
</head>
<body>
<div id="container">


						
<div  style="text-align:center">
	<div align="center">

		<table border="0" width="400px" cellpadding="0" cellspacing="0" style="text-align:left">
		<tr><td height="190px" valign="bottom" colspan="2">
			<div style="font-size:24px;font-family:'Arial Black';text-align:center;margin-bottom:10px;color:white">

			<?php echo $html->image("konfia.jpeg",array("width" => "400px")); ?><br>
			Centro de Evaluaciones</div>
		</td></tr><tr>
		<td xalign="center">

			<?php echo $this->Session->flash();$this->Session->delete('Message.flash'); ?>

			<?php echo $content_for_layout ?>
		</td></tr>
		</table>
	</div>
</div>

<div class="qdlink"><a href="<?php echo $html->url(array("controller"=>"authentication","action"=>"admin")) ?>">Admin</a></div>

</div>

<script type="text/javascript">

  $body = $("body");
  $( document ).ajaxStart(function() {$body.show(); $body.addClass("loading");  });
  $( document ).ajaxStop(function() { $body.removeClass("loading");  });
  $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
	  console.log(jqxhr);
	  console.log(settings);

	  //  settings.url;
	  
		if(jqxhr.status == 413){
			//push_flash("File uploaded too large" , "error");	
		} else {
			//push_flash(thrownError , "error");
		}
	});


function submitForm(f){
	// var options = {dataType: 'json', success: processJson };
	// jQuery(f).ajax(options);
	jQuery("#login_errors").html("").hide();
	$(f).ajaxSubmit({success: processJson, type: 'post'});
	 return false;
}

function processJson(data) {
	data = JSON.parse(data);
	 if(data.error == 0){
		
		 jQuery("#login_errors").html("").hide();
		 document.location.href=  data.url_redirect;//base_url_no_slash +
	 } else {
	 	$("#login_errors").html(data.validation_errors).show();
	 }
}

</script>

<div class="cusmodal"></div>

</body>
</html>
