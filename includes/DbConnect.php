<?php

Class DbConnect
{


  var $hostname;
  var $username;
  var $password;
  var $database;

  public function dbconnect($hostname=DB_HOST, $username=DB_USER, $password=DB_PASS, $database=DB_NAME)
    {
      $this->hostname  = $hostname;
      $this->username  = $username;
      $this->password  = $password;
      $this->database  = $database;
	  $this->connect();
      $this->select_db();
	  
    }  

public function connect() { 
      $this->handler = mysql_connect($this->hostname, $this->username, $this->password) or $this->throw_error(mysql_error(), __LINE__);  
  }
 public function select_db() {
       mysql_select_db($this->database, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
  }  


 public function select($table, $columns, $where = '', $groub_by = '', $order_by = '', $limit = '', $debug = 0) {
 // echo $table;       
     if ( $table == '' || !sizeof($columns)) { return; }
      $tmp = '';
      if ( $columns != '*' ) {
           if ( is_array($columns) ) {
               foreach($columns as $column) {
                   $data .= '' . $column . ', ';
               }
               $columns = preg_replace( "/, $/" , "" , $data);
           } else {
               $columns = '' . $columns . '';
           }

      }
      
    if ( is_array($where) ) {
		if ( !empty($where) ) {
			 $tmp = '';
			foreach ($where as $key => $val) {
				 $tmp .= '' . $key . " = '" . $this->escape_str($val) . "' AND ";
			}
			$where = ' WHERE ' . preg_replace( "/ AND $/" , "" , $tmp);
		}
	}	else {
		$where = $where;
	}
	
  $tmp = '';
  if ( !empty($groub_by) ) {
      if ( is_array($groub_by) ) {
          foreach($groub_by as $val => $groub) {
              $tmp .= '`' . $val . '` ' . $groub . ', ';
          }
          $order_by = ' GROUP BY ' . preg_replace( "/, $/" , "" , $tmp);
       } else {
          $order_by = ' GROUP BY ' . $groub_by;
      }
  } 
  
   $tmp = '';
    if ( !empty($order_by) ) {
        if ( is_array($order_by) ) {
            foreach($order_by as $val => $order) {
                $tmp .= '`' . $val . '` ' . $order . ', ';
            }
            $order_by = ' ORDER BY ' . preg_replace( "/, $/" , "" , $tmp);
         } else {
            $order_by = ' ORDER BY ' . $order_by . ' DESC';
        }
    }
    $tmp = '';
    if ( !empty($limit) ) {
        if ( is_array($limit) ) {
            foreach ($limit as $num) {
                $tmp .= $num . ', ';
            }
            $limit = ' LIMIT ' . preg_replace( "/, $/" , "" , $tmp);
        } else {
            $limit = ' LIMIT ' . $limit;
        }
    }
	
    $query = 'SELECT ' . $columns . ' FROM ' . $table . '' . $where . $order_by . $limit;
	
 //echo  $query;
 //exit;
    if ($debug) {
        return $query;
    } else {
       
	    return $this->query($query);
    }
	
 } 
   function insert($table, $data, $slashes = false) {
        if ( $table == '' || $data == '' ) { return; }
		$fields = '';      
		$values = '';
		  if(is_array($data)) {
        foreach($data as $key => $val) {
            $fields .= '`' . $key . '`, ';
            $val = ( $slashes == true ) ? addslashes($val) : $val;
            $values .= "'" . addslashes( stripslashes($val) ) . "'" . ', ';
        }
        $fields = preg_replace( "/, $/" , "" , $fields);
        $values = preg_replace( "/, $/" , "" , $values);
      }     
	  //echo 'INSERT INTO `' . $table . '` (' . $fields . ') VALUES (' . $values . ')';
		$ins=mysql_query('INSERT INTO `' . $table . '` (' . $fields . ') VALUES (' . $values . ')');
		if($ins)
		{
		return true;
		}else
		{
		return false;
		}
		
    }
	
	
	
	function NormalInsert($Query)
	
	{
	
	
		$ins=mysql_query($Query);
		
			if($ins)

		{

		return true;

		}else

		{

		return false;

		}	
		


	
	
	}
	
	
	function Normal_Select($Query)
	
	{
	
	
 $query =$Query;
 //echo  $query;
 // exit;
   
       
	    return $this->query($query);
  

	
	
	}
	
    function update($table, $data, $where, $slashes = false) {
         if ( $table == '' || $data == '' || $where == '') { return; }
        $string  = '';
        $tmp = '';
        foreach($data as $key => $val) {
            $string .= '`' . $key . "` = '" . $this->escape_str($val) . "', ";
        }
        $string = preg_replace( "/, $/" , "" , $string);
        if ( is_array($where) ) {
            foreach ($where as $key => $val) {
                $tmp .= '`'.$key . "` = '" . $this->escape_str($val) . "' AND ";
            }
            $where = preg_replace( "/AND $/" , "" , $tmp);
        } else {
            $where = $where;
        }
		//echo 'UPDATE `' . $table . '` SET ' . $string . ' WHERE ' . $where;
		mysql_query('UPDATE `' . $table . '` SET ' . $string . ' WHERE ' . $where, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
    
	}
    function delete($table, $data) {
        if ( $table == '' || $data == '') { return; }
		 if ( is_array($data) ) {
		 
		//echo 'DELETE FROM `' . $table . '` WHERE `' . key($data) . "` = '" . $data[key($data)] . "'";
		//exit;
			mysql_query('DELETE FROM `' . $table . '` WHERE `' . key($data) . "` = '" . $data[key($data)] . "'", $this->handler) or $this->throw_error(mysql_error(), __LINE__);
		}	else {
		//echo 'DELETE FROM `' . $table . '` '.$data;
		//exit;
			mysql_query('DELETE FROM `' . $table . '` '.$data, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
		}
    }
 public function query($query) {

      if ( $query == '') { return; }
 
      $this->result = mysql_query($query, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
      $this->num_rows = mysql_num_rows($this->result);
	  
      if ($this->num_rows > 0) {
          $tmp_array = array();
          while ($row = mysql_fetch_assoc($this->result)) {
              array_push($tmp_array, $row);
          }
          $this->result = $tmp_array;
          return $this->result;
      } else {
	 $this->result=array();
          return $this->result;
      }
  }
 function execute_query($query) { 
		mysql_query($query, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
	}
    function escape_str($string) {
     	if ( is_array($string) ) {
     		foreach($string as $key => $val) {
     			$str[$key] = $this->escape_str($val);
     		}
     		return $str;
    	}
     	if ( function_exists('mysql_escape_string') ) {
 			return mysql_escape_string( stripslashes($string) );
 		} else {
         	return addslashes( stripslashes($string) );
    	}
    }
	function truncate($table)	{
		$query="TRUNCATE TABLE `".$table."`";
		mysql_query($query, $this->handler) or $this->throw_error(mysql_error(), __LINE__);
	}
	function getLastInsertId(){
		return mysql_insert_id();
	}  
  
 public function db_close(){
        mysql_close($this->handler);
    }  
   
public function test()
{
echo "success";
}
  
}


?>