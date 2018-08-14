<?php
//error_reporting(0);
  include('../includes/connection.php');
    $id = $_POST['a'];
  $query = "update tbl_register set register_status = 1 WHERE register_id ='$id'";
    $sel =mysql_query($query);
    if($sel)
	{
	   echo 1;
    }
	else
    {
		echo 0;
	}    
?>

