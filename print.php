<?php
ob_start();

require_once ('includes/Config.php');

$shipid=explode(' ',$_SESSION['SHIPID']);
$ship_id=$_SESSION['SHIPID']; 
$invoice_id=$_POST['invoicenumber'];
$invoice=$AtlasCMS->sql_query('invoicefrominvoice',$ship_id,$invoice_id);
$invocename=$invoice[0]['customerName'];
$invoceno=$invoice[0]['invoiceNo'];
$invocedate=$invoice[0]['invoiceDtTm'];
$deliverydate=$invoice[0]['delDtTm'];

?>
<!DOCTYPE html>

<div id="save" ><span class="glyphicon glyphicon-floppy-save"></span>
</div>
<input type="hidden" name="invoicenumber" id="invoicenumber" value="<?php echo $_POST['invoicenumber']?>">
	<html>
	<head>
		<title>Print Invoice</title>
		<style>
		
		  #pagelayout table
		   {
			
			font-family: helvetica;
			widht:80%;
			
			font-size: 9px;
			border-left: 1px solid #cccccc;
			border-right: 1px solid #cccccc;
			border-top: 1px solid #cccccc;
			border-bottom: 1px solid #cccccc;
			
			}
			 #pagelayout td
			{
				border: 1px solid #cccccc;
				
			}
		</style>
		
	</head>
	<link rel="stylesheet" href="css/pdf.css">
		<div  id="printpdf"> 
			<div id="pagelayout">
				<H2 id="titleinvoice" style="text-align:center" align="C"><b>Invoice</b></H2> 
					<table class="heading" cellpadding="6" style="width:100%" >
						<tr>
							<td style="width:80mm;height:30%">
								
							   <img src="img/Logo.jpg" id="image" alt="logo"  border="0" />
							</td>
							<td rowspan="2"  valign="top"  >
							
								<table align="R" class="table" align="right" cellpadding="6" width="80%" >
								
									<tr><td>Customer </td><td><?php echo $invocename; ?></td></tr>
									<tr><td>Account Number  </td><td><?php ?></td></tr>
									<tr><td>Delivery Date </td><td><?php echo $deliverydate; ?></td></tr>
									<tr><td>Invoice Number  </td><td><?php echo $invoceno; ?></td></tr>
									<tr><td>Invoice Date  </td><td><?php echo $invocedate; ?></td></tr>
									<tr><td>Invoice Terms </td><td><?php ?></td></tr>
									<tr><td>Due Date </td><td><?php ?></td></tr>					
									
													
							   </table>
							</td>
						</tr>
						<tr>
							<td>
							<p>SOLD TO </p><br/>
							<p><?php ?></p><br/>
							<p><b>SHIP TO </b></p>
							<p style="padding-left:15%"><?php
							
							
							$invoicetotalsum=$AtlasCMS->sql_query('companynameforinvoice',$ship_id);
							
							
							echo $invoicetotalsum[0]['shipToName'].",<br/>";
							
							echo $invoicetotalsum[0]['shipToAddr1'].",<br/>";
							
							if($invoicetotalsum[0]['shipToAddr2'])
							{
							echo $invoicetotalsum[0]['shipToAddr2'].",<br/>";
							}
							
							echo $invoicetotalsum[0]['shipToState'].",<br/>";		
							
							echo $invoicetotalsum[0]['county']."-";
							
							echo $invoicetotalsum[0]['shipToZip'].".<br/>";
							
							?></p>
							
							
							   
								
							</td>
						</tr>
					</table>				
			<div  id="pdf"><br/>  
						<table class="heading"  cellpadding="4" width="100.5%"  >
							<tr>
								<td width="44%" border="none">
								
								
								</td>
								<td  valign="top" align="right" style="padding:2mm;" >
								<table align="R"  cellpadding="4"  >
										<tr style="background-color:#CCCCCC"><td >Current Invoice Amount Due</td><td >Total Amount Due</td></tr>
										<tr height="30px"><td><?php ?></td><td><?php ?></td></tr>
												
							   </table>
							</td>
							</tr>
						</table>
					<div id="wrapper">
						<br/>
							<table align="R" id="headingtab" cellpadding="4"  style="width:94.5%">
								<tr style="background-color:#CCCCCC" >
									<td style="width:20%;">Product</td>
									<td style="width:20%;">Product Description</td>
									<td style="width:20%;">Delivered Quantity</td>
									<td style="width:20%;">Unit Price</td>
									<td style="width:20%;">Extended Price</td>
								</tr>
								<?php
									$invoice=$AtlasCMS->sql_query('invoicefrominvoicenumber',$ship_id,$invoice_id);
									for($i=0;$i<count($invoice);$i++) 
									{
											echo "<tr >";						
											echo "<td>" . $invoice[$i]['prodCode'] . "</td>";
											echo "<td>" . $invoice[$i]['prodDescr'] . "</td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "<td></td>";
											echo "</tr>";
										
									}
								?>
							</table>
			  
						   <div>
							   <p style="margin-top:4px"><b>BOL Number(s):</b>
							   <?php 
							   
										$invoicetax=$AtlasCMS->sql_query('bolnoinvoice',$ship_id);
										for($i=0;$i<count($invoicetax);$i++) 
										{
										echo $invoicetax[$i]['bolNo'].' ';
										}  
							   
							   
							   ?>	   
								</p>
								<p style="margin-top:4px"><b>Tax Summary :</b></p>
								<table  align="R" id="headinggrid" cellpadding="4"  style="width:94.5%" >
									
									<tr style="background-color:#CCCCCC" >
										<td >Tax Description</td>
										<td >Gallons</td>
										<td >Rate</td>
										<td >Extension</td>
									</tr>
									<?php
										$invoicetax=$AtlasCMS->sql_query('invoicetax',$ship_id);
										for($i=0;$i<count($invoicetax);$i++) 
										{
												echo "<tr >";						
												echo "<td>" . $invoicetax[$i]['descr'] . "</td>";
												echo "<td>" . $invoicetax[$i]['QUANTITY'] . "</td>";
												echo "<td>" . $invoicetax[$i]['rate'] ."</td>";
												echo "<td>". $invoicetax[$i]['AMOUNTDUE'] ."</td>";
												echo "</tr>";
											
										}
									?>
									<tr >
										<td style="border-right:none;border-bottom:none"></td>
										<td style="border-bottom:none"></td>
										<td>Total</td>
										<td>
										<?php 
											$invoicetotalsum=$AtlasCMS->sql_query('invoicetotaltax',$ship_id);
											echo $invoicetotalsum[0]['AMOUNTDUE'];	
										?>
										</td>
										</tr>
										<tr >
										<td style="border-right:none;border-bottom:none"></td>
										<td style="border-bottom:none"></td>
										<td>Current Invoice Amount: Due</td>
										<td><?php ?></td>
									</tr>
								</table>
						   </div>
						<div>
						<table id="headingcontent" cellpadding="4"  style="width:100%;">
							<tr>
								<td id="tabletd" style="width:80mm;height:30%">                
										<img src="img/Logo.jpg" id="image" alt="logo"  border="0" />
								</td>
							  	<td>
									<p><b>Payment Coupon</b></p>
									<p>Please detach and enclose this portion with your
									payment - Do not send cash</p>
									<table align="R" cellpadding="4"  style="width:50%;margin-top: 10px;">
										<tr style="background-color:#CCCCCC">
											<td >Your Account Number</td>
										</tr>
										<tr height="30px">
											<td><?php ?></td>
										</tr>
											
									</table>
									<p></p>
									<table align="R" cellpadding="4"  style="width:65%;margin-right: 10px;">
										<tr style="background-color:#CCCCCC">
											<td >Invoice Date</td>
											<td >Your Invoice Number</td>
										</tr>
										<tr height="30px">
											<td><?php ?></td>
											<td><?php echo $invoceno?></td>
										</tr>
												
									</table>
									<p></p>
									<table align="R" id="tablenotfit" cellpadding="4"  style="width:105%;margin-right: 10px;">
										<tr style="background-color:#CCCCCC">
											<td style="width:15%" >Due Date</td>
											<td style="width:30%">Current Invoice Amount Due</td>
											<td style="width:25%">Current Amount Due</td>
											<td style="width:25%">Amount Paid</td>
										</tr>
										<tr height="30px">
											<td><?php ?></td>
											<td><?php ?></td>
											<td><?php ?></td>
											<td><?php ?></td>
										</tr>
												
									</table>
								</td>
							</tr>
						</table>
						</div>
					</div>  
			   
			</div>
			 
		   
			 </div>
			</div>   
	</html>
<?php

$HtmlCode= ob_get_contents();
ob_end_flush();
$fp = fopen("pdfmaker/tcpdf/examples/output.html","w");
$AtlasCMS->SESSIONHTML($HtmlCode);
fwrite($fp,$HtmlCode);
$fp = fopen("pdfmaker/tcpdf/examples/output.html", "a");
$target_file_data = "<style>
      table
	   {
		
		font-family: helvetica;
		widht:80%;
		
		font-size: 9px;
		border-left: 1px solid #cccccc;
		border-right: 1px solid #cccccc;
		border-top: 1px solid #cccccc;
		border-bottom: 1px solid #cccccc;
		
		}
		 td
		{
			border: 1px solid #cccccc;
			
		}
	</style>";
fwrite($fp, $target_file_data);
fclose($fp);

?>
<script>
jQuery('#save').click(function() {
location.href="pdfmaker/tcpdf/examples/example_061.php";
});
</script>
<style>
#save
	{
	 background: none repeat scroll 0 0 #CCCCCC;
    border-radius: 0 0 15px;
    cursor: pointer;
    height: 24px;
    padding: 10px 10px 5px 14px;
    width: 27px;
	}
</style>
<script>

jQuery("#headingtab").css({

			      "width": ""
		            });
					
jQuery("#headinggrid").css({

			      "width": ""
		            });

jQuery("#headingcontent").css({

			      "width": ""
		            });	
jQuery("#tabletd").css({

			      "width": ""
		            });	

		
jQuery("#tablenotfit").css({

			      "width": ""
		            });		

</script>