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
	$adid = $_POST["adid"];
	// $AdPic = $_POST["AdPic"];
	$AdLink = $_POST["AdLink"];
	$time_now = strtotime("now");
	$sql="
		UPDATE `buildthedot_thaijobhd_job_ad` 
		SET `AdLink` = '".$AdLink."',
		WHERE `PictureID` = '{$adid}' ;
	";
	@mysql_query($sql);
	
	
	if(file_exists($_FILES['AdPic']['tmp_name']) && is_uploaded_file($_FILES['AdPic']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	header("Location: {$rootadminpath}business-idea.php");
}