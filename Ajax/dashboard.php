<?php
require_once ('../includes/Config.php');
if($_POST['IDs']!="" && $_POST['Customer_id']!="")
{
foreach ($_POST['IDs'] as $i) {
    if($i!="")
	{
	$order .= $i . ",";
	}
}
$dashboardquery=$AtlasCMS->sql_query('dashboard',$_POST['Customer_id']);
if($dashboardquery[0]['Tag']=='U')
{
$update_array=array("Order"=>$order,"Tag"=>'U');
$dashboardarry=$AtlasCMS->sql_query('updatedashboard',$update_array,$_POST['Customer_id']);
}
else
{
$insert_array=array("Order"=>$order,"Tag"=>'U',"Customer_id"=>$_POST['Customer_id']);
$dashboardarry=$AtlasCMS->sql_query('insertdashboard',$insert_array);
}
}
?>