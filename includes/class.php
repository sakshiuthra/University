<?php
//session_start();

/********************************************** 001 login class  *********************/
class login extends connection
{
	function select_Login($username , $password)
	{	
	  //e6e061838856bf47e1de730719fb2609	
		$password=md5($password);		
		$query = "SELECT * FROM  tbl_users WHERE `user_name`='$username' AND `user_password`='$password'";
		$queryValue = $this->aSinRow($query);	
		if (!empty($queryValue))
		{
				$_SESSION['adminId']		 = $queryValue['user_id'];
				$_SESSION['ins_id']		   = $queryValue['user_id'];
				$_SESSION['adminFullName']	 = $queryValue['user_name'];
				return 1;
		}else
		{
			return 'Invalid Login Details.';
			
		}
	}
	
	function getUserSessionName()
	{
		return 'adminId';
	}
	function getUserSessionId()
	{
		return $_SESSION['adminId'];
	}
	
	function getAdminName()
	{
		return $_SESSION['adminFullName'];
	}	
	
}
$classLogin = new login();
/**********************************************end login class  *********************/


/********************************************** insert and update class  *********************/
class save_data extends connection
{
	
function secureSuperGlobal($var)                           // secure special characters /                  
{
	$var	= htmlspecialchars(stripslashes($var));
	$var	= str_ireplace("script", "blocked", $var);
	//$var	= mysql_escape_string($var);
	return $var;
}


function insert($tbl,$fields,$static_fields,$data,$where)               // insert the query
{
	foreach($fields as $key=>$field)
	{
		//$bits[] = "`$field` = '".$this->secureSuperGlobal($data[$field])."'";
		$bits_data = '"'.$this->secureSuperGlobal($data[$field]).'"';
		$bits[] = "`$field` = ".$bits_data."";	
	}
	$setStr=implode(",",$bits);	
	$query="insert into $tbl set ".$setStr.$static_fields;
	if($where == 1){
	   return $query;
	}else{
	   return $this->aLastId($query);
	}
}

function update_record($tbl,$data,$where,$que)               // update single record in table
{	
	$query="update $tbl set $data where $where";
	if($que == 1){
	return $query;
	}else{
		return $this->aRunQuery($query);
	}
}


function update($tbl,$fields,$static_fields,$data,$where,$que)               // insert the query
{
	foreach($fields as $key=>$field)
	{
		$bits[] = "`$field` = '".$this->secureSuperGlobal($data[$field])."'";
	}
	$setStr=implode(",",$bits);	
	$query="update $tbl set $setStr $static_fields where $where";
	if($que == 1){
		return $query;
	}else{		
	return $this->aRunQuery($query);
	}
}

function delete_data($tbl, $where){
	
	$query="DELETE FROM $tbl WHERE $where";	
	return $this->aRunQuery($query);
}


function run_query($query)               // insert the query
{
	
	return $this->aRunQuery($query);
}
function execute_query($query)               // insert the query
{
	
	return $this->aAllRow($query);
}
}


$classSave = new save_data();
/**********************************************insert and update  *********************/


/************************************************************************* Country State ******************/

class fetch extends connection
{
	
	function select_Records($table)
	{
	 	$query ="SELECT * FROM $table";
		return $this->aAllRow($query);
	}
	function select_Record_Where($table,$where)
	{
		$query ="SELECT * FROM $table where $where";
		return $this->aAllRow($query);
	}
	

}
$classFetch = new fetch();


/*********************************for fetch the record from databaes*************************************************************************/
class fetch_selected_row extends connection
{
	
	function get_selected_Records($table,$id,$value)
	{
		$query ="SELECT * FROM $table where $id=$value";
		return $this->aAllRow($query);
	}
     function get_selected_Column($table,$id,$value,$col_name)
	{
		$query ="SELECT $col_name FROM $table where $id=$value";
		return $this->aSinRow($query);
	}
 	function get_selected_where($table,$where)
	{
		$query ="SELECT * FROM $table where $where";
		return $this->aAllRow($query);
	}
	
	function count_records($table,$col_name)
	{
		$query ="SELECT count($col_name) as records FROM $table ";
		return $this->aSinRow($query);
	}
	function match_records($table,$col_name,$where)
	{
	  	$query ="SELECT count($col_name) as records FROM $table $where";
		return $this->aNumRow($query);
	}
	
	function check_record($tbl,$where)
	{
	  	$query ="select * from $tbl $where";
		return $this->aNumRow($query);
	}
	
	
}
$classFetch_Selected_Row = new fetch_selected_row();


/**********************************************************************************************************/





?>
