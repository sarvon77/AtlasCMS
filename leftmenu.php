<!DOCTYPE html>
<html lang="en">
<head>
<style>
.content
{
	text-align:left;
}

.tab-content{
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	padding: 20px;
}
.accordion-heading a
{
color:white
}
.accordion-inner a
{
color:#9D9D9D
}
</style>
</head>
<body>
	<!--<div align="center" class="accordion-heading" style="height: 71px;background: #fa813a;">
		<img src="img/atlas_anytime_menu.png" style="height: 68px;padding-top: 3px;">
	</div>-->
	<div class="content" style="background:#212229;padding:13px 10px">

		<div class="accordion" id="accordion2">
			<div class="accordion-group">
					
					<div class="accordion-heading"> <a id="t1" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Customers</a> 
					</div>
					<div id="collapseOne" class="accordion-body collapse">
							  
							  <div class="accordion-inner"><a href="#">BOL Search</a></div>
							  <div class="accordion-inner"><a href="#" id="menu2">Price Quotes</a></div>
							  <div class="accordion-inner"><a href="#" id="menu1" >Invoice Review</a></div>
							  <div class="accordion-inner"><a href="#">Draft Notice</a></div>
							  <div class="accordion-inner"><a href="#">Delivery Tickets</a></div>
							  <div class="accordion-inner"><a href="#">Announcements</a></div>
							  <div class="accordion-inner"><a href="#">Account Information</a></div>
							  <div class="accordion-inner"><a href="#">Reset Password</a></div>
							  
					</div>
			 </div>
		  
		  
		  
		  
			<div class="accordion-group">
					<div class="accordion-heading"><a id="t2" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Atlas Users</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner"><a href="#">Atlas View</a> </div>
					</div>
			</div>
			<div class="accordion-group">
					<div class="accordion-heading"><a id="t3" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Others</a>
					</div>
					<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner"><a href="#">Request for order</a>  </div>
							<div class="accordion-inner"><a href="#">Real-time Delivery Info</a> </div>
							<div class="accordion-inner"><a href="#">Market Updates</a></div>
					</div>
			</div>
		</div>

	</div> 
	
</body>
</html>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript">
	$("#menu1").click(function()
		{
			
			$('#main_content').load('invoice.php');
			
			
								});
	$("#menu2").click(function()
		{
		 
			$('#main_content').load('price_quotes.php');
			
		});
</script>