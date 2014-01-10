<?php
require_once ('includes/Config.php');
$customer_id=1;
$dashboardquery=$AtlasCMS->sql_query('dashboard',$customer_id);
if($dashboardquery[0]['Tag']=='U')
{

$dashboardarray=$dashboardquery[0]['Order'];
$dashboard=explode(",",$dashboardarray);
}
else
{
$dashboardquery=$AtlasCMS->sql_query('dashboard',0);
$dashboardarray=$dashboardquery[0]['Order'];
$dashboard=explode(",",$dashboardarray);
}

?>
<!DOCTYPE html>
<style>
#connected
{

}
#share a
{
padding-left: 20px;
padding-right: 20px;
}
</style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title>Atlas Anytime</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support --> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="css/boot-business.css" rel="stylesheet">
		<link rel="stylesheet" href="css/table.css">
		<link rel="stylesheet" href="css/demo_page.css">
		<link rel="stylesheet" href="css/demo_table.css">
  </head>
  <body>
  <div id="fullpage">
 
	 <header>
      
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner" style="">
				<div class="container">
					<a href="home.php" class="brand brand-bootbus"><img src="img/atlas_anytime-logo.png" style="height: 55px;"></a>
					 <!-- Below button used for responsive navigation -->
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
           
					<div class="nav-collapse collapse" > 
					
							
						<ul class="nav pull-left">
							<li id="menuslideupdown" onclick="menuselect()">
								<a href="#">
								<i class="glyphicon glyphicon-th"  ></i>
								</a>
							</li>
							
								
							
							
						</ul>
						<ul class="nav pull-right" style="left: 0px;">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" style="color:#FFF" data-toggle="dropdown">Danny<b style="border-bottom-color: #FFF;border-top-color: #FFF;" class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="./index.php">Logout</a></li>
									<li><a href="#">Password Reset</a></li>
									<li><a href="#" onclick="return resetdash();">Reset dashboard</a></li>
								</ul>
							</li>
						</ul>
						
					</div>
				</div>
			</div>
			
		</div>
    </header>
	
	<div class="content" id="main_content" style="">
		<div  class="row-fluid">
			
            <ul id="connected" class="thumbnails">
              
			  <?php for($i=0;$i<count($dashboard);$i++)
			                {
			           include("dashboard/".$dashboard[$i]); 
					   
					   }
					   
					   ?>
						
				
			
			  
				
				
			
			 
			 
				
			 
			  
				
				
			
			 
			</ul>
		</div>
	</div>
	<div id="printwhole">
	</div>
	<div id="printview">
	</div>	
	<div class="navbar navbar-fixed-bottom" >
	<div class="navbar-inner scroll" style="background:#fa813a">
			<ul class="pull-left" style="width:25%;margin:0px;background:#292d3d;">
				
					<span id="share" style="line-height: 46px;">
						<a href="#" class="brand brand-bootbus"><img src="img/facebook_big_icon.png" style="height:28px"></a>
						<a href="#" class="brand brand-bootbus"><img src="img/twitter.png" style="height:28px"></a>
						<a href="#" class="brand brand-bootbus"><img src="img/instagram-512.gif" style="height:28px"></a>
						<a href="#" class="brand brand-bootbus"><img src="img/google-plus-128.png" style="height:28px"></a>
					</span>
				
			</ul>
			<p class="leftpara pull-right">
				
				<span style="padding-left:0px ;line-height: 15px;height:11px">
					NEWS:<marquee  behavior="scroll" scrollamount="7" direction="left" width="72%">Welcome to Atlas Anytime....</marquee>
				</span> 
				
			</p>
			<img src="img/atlas_anytime-logo.png" style="height: 46px;float:right"/>
				
		</div>
	</div>
	
	<div id="dynamicmenu">
	<?php include('leftmenu.php')?>
	
	</div>
	
	
	
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>
	<script type="text/javascript" src="js/easypiechart.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.mouse.js"></script>
	<script src="js/jquery.ui.draggable.js"></script>
	<script src="js/jquery.ui.sortable.js"></script>
	<script type="text/javascript" src="js/bootstrap_table.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	</div>
  </body>
</html>

                        
<script>
var data = new Object();


// start pie chart   
	document.addEventListener('DOMContentLoaded', function() {
		var chart = window.chart = new EasyPieChart(document.querySelector('em'), {
		
		
			easing: 'easeOutElastic',
			delay: 3000,
			onStep: function(from, to, percent) {
				this.el.children[0].innerHTML = Math.round(percent);
				
			}
		
		});

		

	});
	
// end pie chart 	


	

//Start Accordion Menu Slider
$(document).ready(function () {

    $(".glyphicon").bind('click', function () {	

	var id=this.id.concat('_list');
	
	var classname=$('#'+this.id).attr('class');
		
	if(classname=='glyphicon glyphicon-minus-sign')
	{
	$('#'+this.id).removeClass(classname).addClass('glyphicon glyphicon-plus-sign');
	jQuery('#'+id).slideUp(50);
	}
	else if(classname=='glyphicon glyphicon-plus-sign')
	{
	 $('#'+this.id).removeClass(classname).addClass('glyphicon glyphicon-minus-sign');
	 jQuery('#'+id).slideDown(50);
	}
    });
});

//end Accordion Menu slider





//mouse pointer on <i> tag
$("i").hover(function () {	
	jQuery("i").css({"cursor": "pointer"});
});

//end mouse pointer on <i> tag





// line chart

$(function() {

		var d1 = [];
		for (var i = 0; i <= 10; i += 1) {
			d1.push([i, parseInt(Math.random() * 30)]);
		}
		var stack = 0,
			bars = false,
			lines = true,
			steps = false;

		function plotWithOptions() {
			$.plot("#placeholder", [ d1 ], {
				series: {
					stack: stack,
					lines: {
						show: lines,
						fill: true,
						steps: steps
					},
					bars: {
						show: bars,
						barWidth: 0.6
					}
				}
			});
		}

		plotWithOptions();

		$(".stackControls button").click(function (e) {
			e.preventDefault();
			stack = $(this).text() == "With stacking" ? true : null;
			plotWithOptions();
		});

		
		
	});


//end line chart







//remaining object box	
    //var skillBar = $(this).siblings().find('.inner');
	var skillBar = $('.btn').siblings().find('.inner');
    var skillVal = $('#processbar').attr("data-progress");
    $(skillBar).animate({
        height: skillVal
    }, 1500);
// end remaining object box








	
//start dynamic menu

function menuselect()
{
	//	
				jQuery('#dynamicmenu').slideDown(50);
				$("#menuslideupdown").attr("onclick","menuselectoff()");
			
}


/*$('#dynamicmenu').on('mouseover', function(){

 $(this).on('mouseleave',hideDropdown);
 
});
function hideDropdown(e)
{
	window.setTimeout("jQuery('#dynamicmenu').slideUp(500);", 1500);
	
 }*/
 
 
 
function menuselectoff()
{
		
				jQuery('#dynamicmenu').slideUp(500);
				$("#menuslideupdown").attr("onclick","menuselect()");
}
 //dynamic menu
 
 
 
 
 
 
 //start drag and drop
$(function() {
		$( "#connected" ).sortable({
			revert: true,
			
		});
		
		$( "ul, li" ).disableSelection();
		
	});
$( "#connected li" ).on( "dragstop", function( event, ui ) {alert("test");} );

 //end drag and drop//
 
 
 
 
 
 
 //save dashboard after moved
 
function dragdrop()
{
 $('#connected').bind('dragend',function( event ){
             
                });  
		var IDs = [];
		$("#connected").find("li").each(function()
		{ 
		IDs.push(this.id);
		
		});
		
 
 data['IDs'] = IDs;
data['Customer_id'] ='<?php echo $customer_id ;?>';
 url="Ajax/dashboard.php";
 
 jQuery.post(
				url,
				data,
				function (response)
				{
				}
				)
 }
 //end save dashboard after moved 
 
 
 
 
  //reset dashboard
 function resetdash()
 {
	window.setTimeout("ajaxlaterexe()", 700);
 }
 
 function ajaxlaterexe()
 {
 data['Customer_id'] ='<?php echo $customer_id ;?>';
	url="Ajax/dashboardreset.php";
 
	jQuery.post(
				url,
				data,
				function (response)
				{
				location.reload();
				}
				)
 }
 //end reset dashboard
 


 
 //hide popup
jQuery('#printview').click(function() {
jQuery("#printwhole").css({
			      "display": "none"
		            });
 
jQuery("#printview").css({
			      "display": "none"
		            });
});
 //end hide popup
 
jQuery('.accordion-inner a').click(function()
 {
 menuselectoff();
 });

 
 
 
 

	
	
	</script>
	