<?php
function insert($tbl,$fields,$static_fields,$data,$where)
{

	foreach($fields as $key=>$field)
	{
		$bits[] = "`$field` = '".secureSuperGlobal($data[$field])."'";
	}
	 $setStr=implode(",",$bits);
	
	$query="insert into $tbl set ".$setStr.$static_fields;
	$sqlRs=mysql_query($query);
	return  1;
}

function gettotal($tbl)
{
$sel = "select * from $tbl";
$insert = mysql_query($sel);
$aa = mysql_num_rows($insert);
return $aa;
}

function gettotalpay($tbl, $static)
{
$total_pay =0;
$sel = "select * from $tbl";
$insert = mysql_query($sel);
while($row= mysql_fetch_assoc($insert))
{
    $pay = $row[$static];
    $total_pay += $pay;
}
   return $total_pay;
}

function getData($tbl,$static1,$static2)
{
$data=array();
$sel = "select * from $tbl";
$insert = mysql_query($sel);
while($get = mysql_fetch_assoc($insert))
{
 $data1= $get[$static1];
 $data2= $get[$static2];
 $data[]= [$data1, $data2];
}
return $data;
}

function selectdata($tbl)
{	
	$a = array();
	$query="select * from $tbl";
	$sqlRs=mysql_query($query);
	while($row= mysql_fetch_assoc($sqlRs))
{	
	   $a[] = $row;
}	
return $a; 
}

function select_student_data($tbl)
{	
	$a = array();
	$query="select * from $tbl ORDER BY adm_addedon desc";
	$sqlRs=mysql_query($query);
	while($row= mysql_fetch_assoc($sqlRs))
{	
	   $a[] = $row;
}	
return $a; 
}
 
function delete_data($tbl, $where){
	
	$query="DELETE FROM $tbl WHERE $where";
	$sqlRs=mysql_query($query) or die("Mysql updation error : ".mysql_error());
	return 1;
}
function selectpardata($tbl,$static,$data)
{	
	$query="select * from $tbl where $static = '$data'";
	$sqlRs=mysql_query($query);
	$row= mysql_fetch_assoc($sqlRs);	
	   return $row;
	 
}

function select_data($tbl,$static,$data)
{	
     $d= array();
	$query="select * from $tbl where $static = '$data'";
	$sqlRs=mysql_query($query);
	while($row= mysql_fetch_assoc($sqlRs))
	{		
	   $d[]= $row;
	}
	return $d;
}

function checkAdminLogin($tbl,$static)
{	
    $query="select * from $tbl where $static";
	$sqlRs=mysql_query($query);	
    $aa= mysql_num_rows($sqlRs);
	   return $aa;	 
}
function checkLogin($tbl)
{	
	$query="select * from $tbl";
	$sqlRs=mysql_query($query);	
    $aa= mysql_num_rows($sqlRs);
	   return $aa;	 
}
function getPageName()
{
$page_name=array();
$page_id=array();
$sel = "select p_name, p_id from pages_tbl";
$insert = mysql_query($sel);
while($get = mysql_fetch_assoc($insert))
{
$page_name[]= $get['p_name'];
$page_id[]=$get['p_id'];
}
return array($page_name, $page_id);
}

function getCouponAmount($q_status)
{
$sel = "select coupon_amount from tbl_cart_coupon where coupon_code = '".$q_status."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['coupon_amount'];
}

function count_leads($q_status)
{
$sel = "select * from contact_queryform where q_status = '".$q_status."'";
$insert = mysql_query($sel);
return mysql_num_rows($insert);
}

function getAdminName($webtype_id)
{
$sel = "select user_name from   tbl_users where user_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['user_name'];

}
function getProName($webtype_id)
{
$sel = "select pro_name from   tbl_product where pro_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['pro_name'];

}
function getStoreName($webtype_id)
{
$sel = "select store_name from  tbl_store where store_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['store_name'];

}
function getProImageName($webtype_id)
{
$sel = "select pro_image from   tbl_product where pro_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['pro_image'];

}
function getWebName($webtype_id)
{
$sel = "select webtype_name from   web_type where 	webtype_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['webtype_name'];

}
function getEmpName($webtype_id)
{
$sel = "select name from  employee_reg where emp_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['name'];

}
function getCategoryName($webtype_id)
{
 $sel = "select cat_name from  tbl_category where cat_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['cat_name'];

}

function getSubSubCategoryName($webtype_id)
{
 $sel = "select sub_sub_name from  tbl_sub_subcategory where sub_sub_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['sub_sub_name'];

}

function getSubCategoryName($webtype_id)
{
$sel = "select sub_name from  tbl_subcategory where sub_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['sub_name'];

}
function getPriority($webtype_id)
{
$sel = "select name from  tbl_priority where pid = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['name'];

}
function getPhoneName($webtype_id)
{
$sel = "select number from  employee_reg where emp_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['number'];

}
function getClientName($webtype_id)
{
$sel = "select q_name from  contact_queryform where qid = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['q_name'];

}



function get_webtype($webtype_id)
{
$sel = "select * from web_type where webtype_id = '".$webtype_id."'";
$insert = mysql_query($sel);
$get = mysql_fetch_assoc($insert);
return $get['webtype_name'];

}


function humanTiming($time)
{

	$time = time() - $time; // to get the time since that moment
	$time = ($time<1)? 1 : $time;
	$tokens = array (
		31536000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	}

}


function checkValidImage($image)
{
	$ext	=	end(explode(".", $image));
	if(in_array($ext, $GLOBALS['arrValidImageType']))
	{
		return true;
	}
	return false;
}

function  is_valid_email($email) {
if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", $email)) 
	return false;
return true;
}

function secureSuperGlobal($var)
{
   

	$var	= htmlspecialchars(stripslashes($var));
	$var	= str_ireplace("script", "blocked", $var);
	$var	=  mysql_real_escape_string($var);
	return $var;
}


function update($tbl,$fields,$static_fields,$data,$where){
	
	foreach($fields as $key=>$field)
	{
		$bits[] = "`$field` = '".secureSuperGlobal($data[$field])."'";
	}
	$setStr=implode(",",$bits);
    $query="update $tbl set $setStr $static_fields where $where";
	$sqlRs=mysql_query($query) or die("Mysql updation error : ".mysql_error());
	return true;
}
function sendmail($to,$subject,$msg,$mailheaders)
{
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= $mailheaders;
	//echo $msg;
	if(mail($to,$subject,$msg,$headers))
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>