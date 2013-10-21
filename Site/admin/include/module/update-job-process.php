<?php
	$rootpath ="../../../";
	$rootadminpath ="../../"; 
	include($rootadminpath."include/connect-to-database.php");
	session_start();
	$company_name = $_POST['CompanyName'];
	$position_thai_name = $_POST['PositionThaiName'];
	$position_eng_name = $_POST['PositionEngName'];
	$place_name = $_POST['PlaceName'];
	$quantity = $_POST['Quantity'];
	$description = $_POST['Description'];
	$saraly = $_POST['Saraly'];
	$FP = $_POST['FP'];
	$property = $_POST['Property'];
	$date_start = $_POST['date_from'];
	$date_end = $_POST['date_to'];
	if(isset($_POST['recommend']))
	{
		$recomment = 1;	
	}
	else {
		$recomment = 0;
	}
	$jid = $_SESSION['jid'];
	$SQL = "UPDATE buildthedot_thaijobhd_job SET CompanyName = '$company_name' ,  PositionThai = '$position_thai_name',PositionEng = '$position_eng_name' ,  Place = '$place_name', Quantity = '$quantity', Saraly = '$saraly',  JobDescription = '$description',  Recomment = '$recomment', Property = '$property' , StartTime = '$date_start',  EndTime = '$date_end',  JobType = '$FP' WHERE JobID = '$jid' ";
	$resultSQL = mysql_query($SQL);
	if($resultSQL)
	{
			?>
							<script language="javascript">
									window.location="http://localhost/buildthedot-24-thaijobhd/Site/admin/edit-job.php?id=<?php echo $jid?>";
									alert("Ok");
							</script>
			<?php
	}
	else
	{
			?>
							<script language="javascript">
									window.location="http://localhost/buildthedot-24-thaijobhd/Site/admin/edit-job.php?id=<?php echo $jid?>";
									alert("No");
							</script>
			<?php
	}
?>