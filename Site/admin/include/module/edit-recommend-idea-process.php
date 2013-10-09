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
	$CompanyID = $_POST["CompanyID"];
	$MainIdea = $_POST["MainIdea"];
	$Description1 = $_POST["Description1"];
	$Description2 = $_POST["Description2"];
	$Description3 = $_POST["Description3"];
	// $pic1 = $_POST["pic1"];
	// $pic2 = $_POST["pic2"];
	// $pic3 = $_POST["pic3"];
	$IdeaRecomment = $_POST["IdeaRecomment"];
	$time_now = strtotime("now");
	$sql="
		UPDATE `buildthedot_thaijobhd_job_idea` 
		SET `MainIdea` = '".$MainIdea."',
		SET `Description1` = '".$Description1."',
		SET `Description2` = '".$Description2."',
		SET `Description3` = '".$Description3."',
		SET `IdeaRecomment` = '".$IdeaRecomment."'
		WHERE `CompanyID` = '{$CompanyID}' ;
	";
	@mysql_query($sql);
	
	
	if(file_exists($_FILES['pic1']['tmp_name']) && is_uploaded_file($_FILES['pic1']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	if(file_exists($_FILES['pic2']['tmp_name']) && is_uploaded_file($_FILES['pic2']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process3.php");
	}
	if(file_exists($_FILES['pic3']['tmp_name']) && is_uploaded_file($_FILES['pic3']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process4.php");
	}
}