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
	$CompanyID = $_GET["CompanyID"];
	$time_now = strtotime("now");
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_job_idea` 
		WHERE `CompanyID` = '{$CompanyID}' ;
	";
	$result = @mysql_query($sql);
	while ($rs = @mysql_fetch_array($result)) {
		if($rs["Pic1"]!=""){
			unlink($rootpath."images/business-idea/".$rs["Pic1"]);
		}
		if($rs["Pic2"]!=""){
			unlink($rootpath."images/business-idea/".$rs["Pic2"]);
		}
		if($rs["Pic3"]!=""){
			unlink($rootpath."images/business-idea/".$rs["Pic3"]);
		}
	}
	
	$sql="
		DELETE FROM `buildthedot_thaijobhd_job_idea` 
		WHERE `CompanyID` = '{$CompanyID}' ;
	";
	@mysql_query($sql);
	header("Location: {$rootadminpath}business-idea.php");
}