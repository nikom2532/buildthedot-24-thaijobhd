<?php

$rootpath ="../../../";
$rootadminpath ="../../"; 
include($rootadminpath."include/connect-to-database.php");


	
	$sid = $_REQUEST["SID"];
	
	$sql = "DELETE FROM  buildthedot_thaijobhd_slide WHERE sid = {$sid}";
	$result = mysql_query($sql);
	if($result)
	{
		echo json_encode(true);
	}
	else {
		echo json_encode(false);
	}

?>