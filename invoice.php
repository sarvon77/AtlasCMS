<?php
require_once ('includes/Config.php');
$_SESSION['SHIPID']=1;
			
?>

<div class="row-fluid" id="invoicepage">
		<ul id="dynamic" class="thumbnails">
		<?php include('dashboard/report.php')?>
           <li class="span8" id="title" >
				<div class="thumbnail" id="">
				Invoice
				</div>
			</li>  
			<li class="span8" style="" >
				<div class="thumbnail" id="" >
					<form id="invoicedata" name="invoicedata">
						<input type="hidden" name="hdnid" id="hdnid" value="">
							<table style="margin-top:15px" class="table">
								<tr>
									<td style="width:15%"><b>Invoice Date</b><br/>From: </td>
									<td style="width:30%">
										<div class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
											<input class="form-control" type="text" readonly="" id="invoicefrom" name="invoicefrom" value="<?php echo $invoicefrom;?>" style="width:96%" >
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</td>
									<td style="width:5%">To:</td>
									<td style="width:30%">
										<div class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
											<input class="form-control" type="text" id="invoiceto" name="invoiceto" value="<?php echo $invoiceto;?>" readonly="" style="width:96%" >
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</td>
									<td style="width:15%">
										<i style="margin-top: 8px;" onclick="return invoice(3);" class="glyphicon glyphicon-search"></i>
									</td>
									
								</tr>
								<tr>
									<td style="font-weight:bold">
										Invoice  Number
									</td>
									<td style="width:30%">
										<input type="text" style="width:95%" class="form-control" id="invoicenumber" name="invoicenumber" value="<?php echo $invoicenumber;?>" >
									</td>
									<td>
									</td>
									<td>
									</td>
									
									<td>
										<i style="margin-top: 8px;" onclick="return invoice(1);"  class="glyphicon glyphicon-search"></i>
									</td>
									
								</tr>
								<tr>
									<td style="font-weight:bold">
										Bol Number
									</td>
									<td style="width:30%">
										<input type="text" style="width:95%" class="form-control" id="bolnumber" name="bolnumber" value="<?php echo $bolnumber;?>" >
									</td>
									<td>
									</td>
									<td>
									</td>
									
									<td>
										<i style="margin-top: 8px;" onclick="return invoice(2);"  class="glyphicon glyphicon-search"></i>
									</td>
									
								</tr>
								<tr>
									<td style="width:15%"><b>Ship Date</b><br/>From: </td>
									<td style="width:30%">
										<div class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
											<input class="form-control" type="text" id="shipfrom" name="shipfrom" value="<?php echo $shipfrom;?>" readonly="" style="width:96%" >
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</td>
									<td style="width:5%">To:</td>
									<td style="width:30%">
										<div class="input-group date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
											<input class="form-control" type="text" id="shipto" name="shipto" value="<?php echo $shipto;?>" readonly="" style="width:96%" value="">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</td>
									
									<td style="width:15%">
										<i style="margin-top: 8px;" onclick="return invoice(4);" class="glyphicon glyphicon-search"></i>
									</td>
									
								</tr>
							</table>
						</form>	
					</div>					
			</li>
			<?php include('dashboard/spotlight.php')?>
			<li class="span8"  style="">
				<div class="thumbnail" id="" >
					<form id="invoicegrid" name="invoicegrid">
					
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"  id="example">
						
							<thead>
								<tr >                     
									<th   style="text-align:left;width:20%">Invoices Date</th>
									<th   style="text-align:left;">Invoices Number</th>
									<th   style="text-align:left;">Due Amount</th>
									<th   style="text-align:left;">Print</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if ($_POST['hdnid']==1)
							{
								$invoicegrid=$AtlasCMS->sql_query('invoicefrominvoicenumber',$_SESSION['SHIPID'],$_POST['invoicenumber']);
							}
							else if ($_POST['hdnid']==2)
							{
								$invoicegrid=$AtlasCMS->sql_query('invoicefrombolnumber',$_SESSION['SHIPID'],$_POST['bolnumber']);
							}
							else if ($_POST['hdnid']==3)
							{
								$invoicegrid=$AtlasCMS->sql_query('invoicefrominvoicedate',$_SESSION['SHIPID'],$_POST['invoicefrom'],$_POST['invoiceto']);
							}
							else if ($_POST['hdnid']==4)
							{
								$invoicegrid=$AtlasCMS->sql_query('invoicefromshipdate',$_SESSION['SHIPID'],$_POST['shipfrom'],$_POST['shipto']);
							}
								for($i=0;$i<count($invoicegrid);$i++) 
								{
									echo "<tr >";
									echo "<td>" . $invoicegrid[$i]['invoiceDtTm'] . "</td>";
									echo "<td>" . $invoicegrid[$i]['invoiceNo'] . "</td>";
									echo "<td>" . $invoicegrid[$i]['currentBalance'] . "</td>";
									echo "<td><img style='cursor: pointer;height: 20px;width: 23px;' src='img/Pdf_icon.png' onclick='return pdfpage(". $invoicegrid[$i]['invoiceNo'] .");' title='Print' alt='print Pdf' ></td>";
									echo "</tr>";
								}
								
							?>
							</tbody>
						</table>
					</form>
				</div>
			</li>
	</ul>
</div>
<script>
$(document).ready(function(){
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	loader();
	gridload();
});
function loader()
{
	$('#example').dataTable
	( {
		//"sDom": "<'row_val'<'span8'l><'span8'f>r>t<'row_val'<'span8'i><'span8'p>>",
		//"sPaginationType": "bootstrap",
		"sScrollY": "112px",
		"bScrollCollapse": true,	
	} );
	
}

function invoice(value)
{
	var searchvalue=value;
	document.getElementById("hdnid").value=searchvalue;
	jQuery.ajax({
        type: "POST", 
        datatype: "json",
        cache: true,
        url:'invoice.php',
         data: jQuery("#invoicedata").serialize(),
        success: function(data)
		{
		var invoicegridform = jQuery(data).find("#invoicegrid");
		jQuery("#invoicepage #invoicegrid").replaceWith(invoicegridform);
		loader();
		
		}
		});
}
function pdfpage(invoicedata)
{
	var data = new Object();
	var invoicenumber=invoicedata;
	data['invoicenumber'] = invoicenumber;
	url="print.php";
 
	jQuery.post(
				url,
				data,
				function (response)
				{
				$("#printwhole").html(response);   
				});

	jQuery("#printview").css
		({
			"display": "block"
		});
	jQuery("#printwhole").css
		({
			"display": "block"
		});
	
}
</script>
