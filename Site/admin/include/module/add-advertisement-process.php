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
	$AdLink = $_POST["AdLink"];
	$ad_type = $_POST["ad_type"];
	echo $ad_position = $_POST["ad_position"];
	$time_now = strtotime("now");
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_ad`
		WHERE `AdType` = '{$ad_type}'
		AND `AdPosition` = '{$ad_position}' 
	";
	$result = @mysql_query($sql);
	if($rs = @mysql_fetch_array($result)){
		$sql2="
			UPDATE `buildthedot_thaijobhd_ad` 
			SET 
			`AdLink` = '".$AdLink."'
			WHERE `AdType` = '".$ad_type."'
			AND `AdPosition` = '".$ad_position."' ;
		";
		@mysql_query($sql2);
	}
	else{
		$sql2="
			INSERT INTO `buildthedot_thaijobhd_ad` 
			(`AdLink`, `AdType`, `AdPosition`)
			VALUE
			('{$AdLink}', '{$ad_type}', '{$ad_position}') ;
		";
		@mysql_query($sql2);
	}
	if(file_exists($_FILES['AdPic']['tmp_name']) && is_uploaded_file($_FILES['AdPic']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	header("Location: {$rootadminpath}advertisement.php");
}