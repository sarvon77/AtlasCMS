
<!DOCTYPE html>
<html>
  <head>
    <title>Atlas oil</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/boot-business.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
	 <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
  </head>
  <style>
.Absolute-Center {
  height: 38%;
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
}
.loginbackground
{
background: url("img/atlascms-bg.png");
width: 100%;
height: 100%;
position: absolute;
background-repeat: no-repeat;
background-size: 100% 100%;

}
#formlog div
{
padding:5px;
}
#anytimelog p
{
font-size: 39px;
font-weight: bold;
color: #FFF;
}
.buttoncustom
{
border-radius: 0px;
color: white;
}
  </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>
<body style="padding-top:0px;">
	<div class="loginbackground">
	<div align="center" class="span6 Absolute-Center" style="" >
					<div class="thumbnail" id="" style="padding:0px;border-radius: 0px;background:none;border:none">
						<form class="form-horizontal" role="form" style="margin:0px" id="login" >
					
							<div align="center" class="form-group" id="logincolour">
								
								
									<div style="width:100%;height:200px" >
										<div id="anytimelog" style="float:left;height:200px;width:50%;background:#000; opacity:0.7;">
										<p style="margin-top: 59px;">
											ATLAS 
										</p>
										<p style="margin-top: 14px;font-size: 30px;">
											ANYTIME
										</p>
										<p style="margin-top: 10px;color:#44d600;font-size:25px">
										800.878.2000
										</p>
										</div>
										<div id="formlog" style="float:right;height:200px;width:50%;background:#FFFFFF; opacity:0.7;">
											
											<div class="" style="padding-top: 34px;">
													<!--<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>-->
													<input type="email" class="form-control" style="border-radius:0px" id="inputEmail3" placeholder="Email">
											</div>
											
											<div class="">
													<!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->
													<input type="password" class="form-control" style="border-radius:0px" id="inputPassword3" placeholder="Password">
											</div>
											
											
											<div class="col-sm-offset-2 col-sm-10" style="">
												<button id="login" type="submit" style="float: left;background: #0d2da4;margin-left: 28px;width:73px"  class="btn btn-default buttoncustom">Login</button>&emsp;&emsp;
												<button  style="float: right;background: #44d600;margin-right: 28px;width: 90px;" class="btn btn-default buttoncustom">Register</button>
											</div>
											
											<div class="col-sm-offset-2 col-sm-10" style="padding-top:6px">
														<a href="#" ><b><span style="color:#000;font-weight:100;float: left;margin-left: 29px;">Forgot your password?</span></b></a>
											</div>
											
											<div class="col-sm-offset-2 col-sm-10" style="color:red;padding-top: 18px;">
														<b><span id="error"></span></b>
											</div>
										
										
										</div>
									</div>	
							</div>
						</form>	
						
					</div>
			
	</div>
	</div>
</body>
</html>

<script>
document.getElementById("inputEmail3").focus();
$('form#login').submit(function(e){
   e.preventDefault();
    
	var email=document.getElementById("inputEmail3").value;
	var password=document.getElementById("inputPassword3").value;
	if(email=='admin@admin.com' && password=='admin' )
	{
	window.location.href='home.php';
	}
	else
	{
	document.getElementById('error').innerHTML="wrong username or password";
	}
	
   
 });
  
</script>