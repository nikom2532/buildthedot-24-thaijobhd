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
	$adid = $_GET["adid"];
	$time_now = strtotime("now");
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_ad` 
		WHERE `PictureID` = '{$adid}' ;
	";
	$result = @mysql_query($sql);
	while ($rs = @mysql_fetch_array($result)) {
		if($rs["AdPic"]!=""){
			unlink($rootpath."images/ad/".$rs["AdPic"]);
		}
	}
	
	$sql="
		DELETE FROM `buildthedot_thaijobhd_ad` 
		WHERE `PictureID` = '{$adid}' ;
	";
	@mysql_query($sql);
	header("Location: {$rootadminpath}advertisement.php");
}