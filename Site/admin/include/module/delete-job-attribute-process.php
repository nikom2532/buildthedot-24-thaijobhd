<?php
	$rootpath ="../../../";
	$rootadminpath ="../../"; 
	include($rootadminpath."include/connect-to-database.php");
	
	$id = $_REQUEST['JAID'];
	$SQL = "DELETE FROM buildthedot_thaijobhd_job_attribute WHERE AttributeID = '$id' ";
	$resultSQL = mysql_query($SQL);
	if($resultSQL)
	{
		echo TRUE;
	}
	else {
		echo FALSE;
	}
?>