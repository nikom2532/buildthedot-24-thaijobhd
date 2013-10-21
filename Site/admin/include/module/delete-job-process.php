<?php
	$rootpath ="../../../";
	$rootadminpath ="../../"; 
	include($rootadminpath."include/connect-to-database.php");
	
	$id = $_REQUEST['JID'];
	$SQL = "DELETE FROM buildthedot_thaijobhd_job WHERE JobID = '$id' ";
	$resultSQL = mysql_query($SQL);
	if($resultSQL)
	{
		echo TRUE;
	}
	else {
		echo FALSE;
	}
?>