<?php
//error_reporting(0);
  include('../includes/connection.php');
    $subcat_id = $_POST['subcat_id'];
    $data = array();
    $query = "SELECT * FROM tbl_product WHERE subcat_id ='".$subcat_id."'";
    $sel =mysql_query($query);
    while ($row = mysql_fetch_assoc($sel)) {
	    $data[] = $row;		
   }
    echo json_encode($data);
   
?>

