<?php


require_once ('DbConnect.php'); 

class Sql extends DbConnect
{
var $resquery;

public function sql_query($flag,$val='NULL',$val1='NULL',$val2='NULL',$val3='NULL',$val4='NULL',$val5='NULL',$val6='NULL')
{

			 switch($flag)
				{
				case 'dashboard':	
		  			$this->resquery=$this->select("tDashboard","*"," where Customer_id='".$val."'");
					 break;
				case 'updatedashboard':				
					$this->resquery=$this->update("tDashboard",$val,"Customer_id='".$val1."'");
					break;
				case 'deletedashboard':	
		  			$this->resquery=$this->delete("tDashboard","where Customer_id='".$val."'");
					 break;
				case 'insertdashboard':				
					$this->resquery=$this->insert("tDashboard",$val,"Customer_id='".$val1."'");
					break;
				case 'companyname':	
		  			$this->resquery=$this->select("tCustomers","*"," where SHIPTOID!=''");
					 break;
				case 'companynameforinvoice':	
		  			$this->resquery=$this->select("tCustomers","*"," where SHIPTOID='".$val."'");
					 break;
					 
				case 'bolnoinvoice':	
		  			$this->resquery=$this->select("tInvoices","*"," where SHIPTOID='".$val."'");
					 break;
				case 'invoicetax':	
		  			$this->resquery=$this->select("tInvoiceTax","DESCR,SUM(QUANTITY) as QUANTITY,RATE,SUM(AMOUNTDUE) as AMOUNTDUE"," where SHIPTOID='".$val."' GROUP   BY TAXID");
					 break;
				case 'invoicetotaltax':	
		  			$this->resquery=$this->select("tInvoiceTax","SUM(AMOUNTDUE) as AMOUNTDUE"," where SHIPTOID='".$val."'");
					 break;
				case 'invoicefrominvoice':	
		  			$this->resquery=$this->select("tInvoices,tCustomers","tInvoices.*,tCustomers.*"," where tInvoices.SHIPTOID='".$val."' and tInvoices.INVOICENO='".$val1."' and tInvoices.SHIPTOID=tCustomers.SHIPTOID");
					 break;
				case 'invoicefrominvoicenumber':	
		  			$this->resquery=$this->select("tInvoices,tCustomers","tInvoices.*,tCustomers.*"," where tInvoices.SHIPTOID='".$val."' and tInvoices.INVOICENO='".$val1."' and tInvoices.SHIPTOID=tCustomers.SHIPTOID");
					 break;
				case 'invoicefrombolnumber':	
		  			$this->resquery=$this->select("tInvoices,tCustomers","tInvoices.*,tCustomers.*"," where tInvoices.SHIPTOID='".$val."' and tInvoices.BOLNO='".$val1."' and tInvoices.SHIPTOID=tCustomers.SHIPTOID");
					 break;
				case 'invoicefrominvoicedate':	
		  			$this->resquery=$this->select("tInvoices,tCustomers","tInvoices.*,tCustomers.*"," where tInvoices.SHIPTOID='".$val."' and tInvoices.INVOICEDTTM BETWEEN'".$val1."%' and'".$val2."%' and tInvoices.SHIPTOID=tCustomers.SHIPTOID");
					 break;
					 
				case 'invoicefromshipdate':	
		  			$this->resquery=$this->select("tInvoices,tCustomers","tInvoices.*,tCustomers.*"," where tInvoices.SHIPTOID='".$val."' and tInvoices.SHIPDTTM BETWEEN'".$val1."%' and'".$val2."%' and tInvoices.SHIPTOID=tCustomers.SHIPTOID");
					 break; 
				case 'pricedate':	
		  			$this->resquery=$this->select("tPriceQuotes","tPriceQuotes.*"," where tPriceQuotes.EFFDATE BETWEEN'".$val."%' and'".$val1."%'");
					 break; 
				} 
	 return $this->resquery;
	

}




Public function SESSIONSHIPID($shipid)
{

$_SESSION['SHIPID']=$shipid;

}
Public function SESSIONHTML($html)
{

$_SESSION['Html']=$html;

}
Public function decodeString($str)
{
 for($i=0; $i<5;$i++)
 {
    $str=base64_decode(strrev($str)); 
 }
 return $str;
}
Public function encodeString($str)
{
  for($i=0; $i<5;$i++)
  {
    $str=strrev(base64_encode($str)); 
  }
  return $str;
}

}



?>



