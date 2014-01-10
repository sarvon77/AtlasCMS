<?php

session_start();

  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); 
  ini_set ( "memory_limit", "-1");
  set_time_limit(86400);
  ini_set ( "output_buffering", false);   
  define('DB_HOST',"localhost");
  define('DB_USER',"root");
  define('DB_PASS',"");
  define('DB_NAME',"AtlasCMS"); 
  define('DIRNAME',dirname(__FILE__));
 
 


require_once ('SqlQuery.php'); 
global $AtlasCMS;
$AtlasCMS=new Sql(); 
$AtlasCMS->dbconnect();