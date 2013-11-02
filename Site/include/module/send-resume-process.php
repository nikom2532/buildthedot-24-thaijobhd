<?php
$rootpath = "./";
$rootadminpath = "./admin/";
include ("../../admin/include/connect-to-database.php");
@send_email();

function send_email(){
	$user_id = $_REQUEST['user_id'];
	$job_id = $_REQUEST['job_id'];
	$sql="	SELECT CompanyName
			FROM  buildthedot_thaijobhd_job
			WHERE JobID = '$job_id'	
			LIMIT 0,1				
		";
	$result=@mysql_query($sql);
	if($result)
	{	
		$count = 0;
		while($rs=@mysql_fetch_array($result))
		{
			$data['Company'] = $rs['CompanyName'];
			$data['positionThai'] = $rs['PositionThai'];
			$data['positionEng'] = $rs['PositionEng'];
		}
	//echo TRUE;
	}
	else {
		
	}
}
?>