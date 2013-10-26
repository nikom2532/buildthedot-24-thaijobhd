<?php
$rootpath ="../../../";
$rootadminpath ="../../"; 
include($rootadminpath."include/connect-to-database.php");
?>
<?php
	session_start();
		
	$company_name = $_SESSION['company_name'];
	$position_thai_name = $_SESSION['position_thai_name'];
	$position_eng_name = $_SESSION['position_eng_name'];
	$place_name = $_SESSION['place_name'];
	$description = 	$_SESSION['description'];
	$quantity =$_SESSION['quantity'] ;
	$saraly = $_SESSION['saraly'];
	$FP = $_SESSION['FP'];
	$property = $_SESSION['property'];
	$date_start = $_SESSION['date_start'];
	$date_end = $_SESSION['date_end'];
	$recomment = $_SESSION['recomment'];
	if($recomment == "re")
	{
		$recommented = 1;
	}
	else 
	{
		$recommented = 0;
	}
	//$recommented = (int)$recomment;
	
	
	$edu = $_POST['edu'];
	$FPint = (int)$FP;
	for($i = 0;$i < count($edu);$i++)
	{
		$education[$i] = $edu[$i];
	}			
	
	/*$company_name = "dsc";
	$position_thai_name = "pt";
	$position_eng_name = "pe";
	$place_name = "pl";
	$description = "de";
	$quantity = "1";
	$saraly = "2";
	$property ;
	$date_start = "2012-02-01";
	$date_end = "2013-12-12";
	$recommented = "1";
	$FPint = "1";
	
	echo $company_name."<br>";
	echo $position_thai_name."<br>";
	echo $position_eng_name."<br>";
	echo $place_name."<br>";
	echo $description."<br>";
	echo $quantity."<br>";
	echo $saraly."<br>";
	echo $property."<br>";
	echo $date_start."<br>";
	echo $date_end."<br>";
	echo $recommented."<br>";
	echo $FPint."<br>";
	
	/*$SQL = "INSERT INTO buildthedot_thaijobhd_job ('CompanyName', 'PositionThai','PositionEng','Place','Saraly','JobDescription', 'Recomment', 'StartTime', 'EndTime', 'JobType') 
	VALUES ($company_name, $position_thai_name, $position_eng_name, $place_name, $saraly, $description, $recommented, $date_start,$date_end, $FPint)";
	*/
	
	echo $SQL = "INSERT INTO  buildthedot_thaijobhd_job (  CompanyName ,  PositionThai ,  PositionEng ,  Place , Quantity , Saraly ,  JobDescription ,  Recomment, Property , StartTime ,  EndTime ,  JobType ) 
			VALUES ( '$company_name',  '$position_thai_name',  '$position_eng_name',  '$place_name', '$quantity' ,'$saraly',  '$description',  '$recommented', '$property' , '$date_start',  '$date_end',  '$FPint')";
	$resultSQL = mysql_query($SQL);
	
	
	if($resultSQL)
	{
		$SQL = "SELECT JobID FROM buildthedot_thaijobhd_job WHERE  CompanyName = '$company_name' AND PositionThai = '$position_thai_name' AND PositionEng = '$position_eng_name'";
		$resultSQL = mysql_query($SQL);
		if($resultSQL)
		{
			while($show = mysql_fetch_array($resultSQL))
			{
				$job_id = $show['JobID'];
			}
	
			$edu = $_POST['edu'];
			if($edu['0'] != null && $edu['0'] != "")
			{
					$FPint = (int)$FP;
					for($i = 0;$i < count($edu);$i++)
					{
						$education[$i] = $edu[$i];
						$SQL = "INSERT INTO buildthedot_thaijobhd_job_attribute (JobID, AttribuetDescription) VALUES ('$job_id', '$education[$i]')";
						$resultSQL = mysql_query($SQL);
						if($resultSQL)
						{
							?>
							<script language="javascript">
									window.location="<?php echo $rootadminpath; ?>insert-job.php";
									alert("Ok");
								</script>
							<?php	
						}
						else 
						{
							?>
							<script language="javascript">
									window.location="insert-job.php";
									alert("Error1");
								</script>
							<?php
						}
						
					}	
			}
			else
			{
				?>
							<script language="javascript">
									window.location="<?php echo $rootadminpath; ?>insert-job.php";
									alert("Error2");
								</script>
							<?php
			}
				
		}
		else
		{
			?>
			<script language="javascript">
					window.location="<?php echo $rootadminpath; ?>insert-job.php";
					alert("Error3");
				</script>
			<?php
		}
			
		
	}
	else 
	{ ?>
		<script language="javascript">
					// window.location="<?php echo $rootadminpath; ?>insert-job.php";
					alert("Error4");
				</script>
	<?php
	}
?>
