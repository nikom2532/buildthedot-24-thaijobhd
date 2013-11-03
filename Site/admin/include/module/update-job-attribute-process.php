<?php
$rootpath ="../../../";
$rootadminpath ="../../"; 
include($rootadminpath."include/connect-to-database.php");
session_start();
$jid = $_SESSION['jid'];
$Att = array();
$Att = $_POST['edu'];
$sucess = 0;
for($i= 0; $i < count($Att);$i++)
{
	if($Att[$i] == null || $Att[$i] == "")
	{
		break;
	}
	$SQL = "INSERT INTO buildthedot_thaijobhd_job_attribute (JobID, AtrributDescription) VALUES ('$jid', '$Att[$i]')";
	$resultSQL = mysql_query($SQL);
	if($resultSQL)
	{
		$sucess++;
	}
}
if($sucess > 0)
{
	?>
							<script language="javascript">
									window.location="<?php echo $rootadminpath; ?>"+"job.php";
									alert("Success");
								</script>
	<?php	
}
else 
{
	?>
							<script language="javascript">
									window.location="<?php echo $rootadminpath; ?>"+"job.php";
									alert("Error");
								</script>
	<?php	
}
	?>