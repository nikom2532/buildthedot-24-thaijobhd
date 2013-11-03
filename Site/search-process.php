<?php
	include("admin/include/connect-to-database.php");
	$value = $_REQUEST['search'];
	$data[] = null;
	$sql="
		SELECT * 
		FROM  buildthedot_thaijobhd_job
		WHERE PositionThai LIKE '%$value%' OR PositionEng LIKE '%$value%'
		ORDER BY JobID DESC	
	";
	$result=@mysql_query($sql);
	if($result)
	{	
		$count = 0;
		while($rs=@mysql_fetch_array($result))
		{
			$data[$count]['id'] = $rs['JobID'];
			$data[$count]['company'] = $rs['CompanyName'];
			$data[$count]['thaiPosition'] = $rs['PositionThai'];
			$data[$count]['engPosition'] = $rs['PositionEng'];
			$data[$count]['Description'] = substr($rs['JobDescription'],0,50);
			$data[$count]['time'] = date("D-M-Y");
			if($rs['JobType'] == 1)
			{		
				$data[$count]['type'] = "Full Time";
			}
			else {
				$data[$count]['type'] = "Part Time";
			}
			$count++;
		}
	}	
	if($data == null)
	{
			echo "No Data";
	}
	else {
			echo json_encode($data);
	}	

?>