<?php
	include("admin/include/connect-to-database.php");
	$value = $_REQUEST['search'];
	$sql="
		SELECT * 
		FROM  buildthedot_thaijobhd_job
		WHERE PositionThai LIKE '%$value%' OR PositonEng LIKE '%$value%' 
		ORDER BY JobID DESC	
	";
	$result=@mysql_query($sql);
	if($result)
	{
		echo ":)";
	}
	while($rs=@mysql_fetch_array($result))
	{
		$data['id'] = $rs['JobID'];
		$data['company'] = $rs['CompanyName'];
		$data['thaiPosition'] = $rs['PositionThai'];
		$data['engPosition'] = $rs['PositionEng'];
		$data['Description'] = $rs['JobDescription'];
	}
	echo json_encode($data);
?>