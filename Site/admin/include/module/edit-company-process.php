<?php 
session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");
if($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	include ("include/footer.php");
}
else{
	
	// $AdPic = $_POST["AdPic"];
	$company_id  =$_POST["company_id"];
	$title = $_POST["title"];
	$LinkAddress = $_POST["LinkAddress"];
	$Status = $_POST["Status"];
	$time_now = strtotime("now");	//.date('Y-m-d H:i:s', $time_now)
	
	$sql="
		UPDATE `buildthedot_thaijobhd_top_company` 
		SET 
		`TopCompanyName` = '".$title."',
		`LinkAddress` = '".$LinkAddress."',
		`Status` = '".$Status."',
		`Time` = '".date('Y-m-d H:i:s', $time_now)."'
		WHERE `TopCompanyID` = '{$company_id}' ;
	";
	@mysql_query($sql);
	
	if(file_exists($_FILES['CompanyPic']['tmp_name']) && is_uploaded_file($_FILES['CompanyPic']['tmp_name'])){
		include($rootadminpath."include/module/edit-company-process2.php");
	}
	header("Location: {$rootadminpath}top-company.php");
}