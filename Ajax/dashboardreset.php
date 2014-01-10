<?php
require_once ('../includes/Config.php');
if($_POST['Customer_id']!="")
{

$dashboardquery=$AtlasCMS->sql_query('dashboard',$_POST['Customer_id']);
if(count($dashboardquery)==1)
{
$dashboardreset=$AtlasCMS->sql_query('deletedashboard',$_POST['Customer_id']);
}
}
?>