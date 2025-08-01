<?php ?>
    <div class="b_container">
	<select id="ocrtest"><option value="1">Test A </option></select>
	<input type="file" id="fotocam"  onchange="load_file(event);">
        <button id="apply">Procesar Imagen</button>
    </div>
    <div class="rcontainer">
        <div id="background" class="o_image">
	<?php echo $html->image("bill.png",["id" => "sample","width" => "400px" , "height" => "400px"]); ?>
        </div>
        <div class="p_image">
           <canvas id="imageInit"></canvas>
        </div>
    </div>

<div id="ocrafter" style="display:none">
	<div style="position:relative;">
		<canvas id="imageResult" ></canvas>

		<form id="ocrform" style="height:640px">
			<table id="overtab" width="740px" style="width:740px;" cellpadding=0 cellspacing=0 border=0>
			<tbody>
			<?php foreach(range(1,30) as $item): ?>
			<tr <?php echo ($item == 16) ? 'style="height:23px"' : "" ?> ><td>
				<input type="hidden" name="p<?php echo $item ?>" value="1">
				<div class="active" onclick="ocrselect(this,1)"></div> 
				<div onclick="ocrselect(this,2)"></div> 
			</td></tr>
			<?php endforeach; ?>
			</tbody>
			</table>
		</form>
	</div>


	<button style="margin-top: 30px;" onclick="submittest();">Procesar Puntaje</button>
	<div id="oformres">
	</div>
</div>


<?php echo $javascript->link(array('libs/qunit-2.0.1','utils',"opencv")); ?>
<?php echo $javascript->link(array('perspective','libs/d3.v3.min')); ?>
<?php echo $javascript->link(array('libs/numeric-solve.min','ocr.index')); ?>
<script type="text/javascript">
// window.location.hash = '#imageResult';
var new_width = 740;
var new_height = 600;

var test_props = [
	[740,600],
	[740,600],
	[740,600],
	[740,600],
	[740,600]
];

function ocrselect(obj,val){
	$(obj).parent().find("div").removeClass("active");
	$(obj).addClass("active").parent().find("input").val( val );
}

function submittest(){
	// $("#ocrtest").val(); // SELECT EXAM TYPE

	$.ajax({
		type: "POST",
		url:  "<?php echo $html->url(["action" => "ocrsubmit"]) ?>" ,
		cache: false, 
		data: $("#ocrform").serialize()
	}).done(function( data) {
		$("#oformres").html(data);
	});		

}

function load_file(event){
	if(event.target.files.length){
		document.getElementById('sample').src = window.URL.createObjectURL(event.target.files[0]);
		//new_width  = test_props[0][0];
		//new_height = test_props[0][1];

		let img = new Image();
		img.onload = function() {
			twidth  = img.width; 
			theight = img.height;
			if(img.width > 1000){
				twidth = 1000;
				theight = parseInt((img.height*1000)/img.width );
			}
		    document.getElementById('sample').width = twidth;
		    document.getElementById('sample').height = theight;
		    $("#sample").next().attr("width", twidth);
		    $("#sample").next().attr("height", theight);
		    //$("#ocrform").height( theight + 30 );
		   
		};
		img.src = window.URL.createObjectURL(event.target.files[0]);
	} else {
		document.getElementById('sample').src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAABCAQAAACC0sM2AAAADElEQVR42mNkGCYAAAGSAAIVQ4IOAAAAAElFTkSuQmCC";
	}

}	

</script>
<style>
#imageResult{position:absolute;top: 0;left: 0;}
#overtab{font-size:8px;z-index:1000;position:relative;top: 21px;}
#overtab tbody tr td{padding:0;margin:0;font-size:7px}
#overtab div{
float:right;
width: 32px;
height: 17.2px;
margin-left: 30px;
margin-right: 5px;
}
#overtab .active{
border: 1px solid red;
border-radius: 14px;opacity: 0.6;
}

.rcontainer{
   position:relative;text-align:left;
	/* display: flex;*/
}
.rcontainer .o_image{
   /** width: 50%;*/
    border-right: 1px solid;
}
.rcontainer .p_image{
  /*  width: 50%;*/

}
.b_container{
    text-align: center;
    width: 100%;
}
svg {
    position: absolute;
    top: 0;
    left: 0;
  }
  
  .line {
    stroke: blue;
    stroke-width: 0.7px;
    stroke-linecap: square;
  }
  
  .handle {
    fill: blue;
    pointer-events: all;
    stroke:blue;
    stroke-width: 2px;
    cursor: move;
    opacity: 0.8;
  }

</style>
