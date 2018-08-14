<?php
  include('../includes/connection1.php');
	include('../includes/class.php');
	 $data = array();
	 $received_papers = $issued_papers = 0;
   $paper_id = $_POST['paper_id'];
   $table = "tbl_paper_record";
	 $where = "paper_id =".$paper_id."and status = 1";
	 $total_papers = $classFetch->select_Record_Where($table,$where);	 
	 foreach($total_papers as $papers){
		 if($papers['activity'] == 1)
		 {
			 $received_papers += $papers['no_of_papers'];
		 }elseif($papers['activity'] == 2){
			 $issued_papers += $papers['no_of_papers'];
			 }
	 }
	$balance_papers = $received_papers - $issued_papers;
  echo $balance_papers;
   
?>

