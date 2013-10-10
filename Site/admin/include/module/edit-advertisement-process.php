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
	$ad_type = $_POST["ad_type"];
	$ad_position = $_POST["ad_position"];
	$time_now = strtotime("now");
	$sql="
		UPDATE `buildthedot_thaijobhd_ad` 
		SET 
		`AdLink` = '".$AdLink."',
		`AdType` = '".$ad_type."',
		`AdPosition` = '".$ad_position."'
		WHERE `PictureID` = '{$adid}' ;
	";
	@mysql_query($sql);
	
	
	if(file_exists($_FILES['AdPic']['tmp_name']) && is_uploaded_file($_FILES['AdPic']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	header("Location: {$rootadminpath}advertisement.php");
}