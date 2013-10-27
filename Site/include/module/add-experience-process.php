<?php
//### Add Education ###
session_start();
$rootpath ="../../";
$rootadminpath ="../../admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$job_position = $_POST["job_position"];
	$company_name = $_POST["company_name"];
	$year_start = $_POST["year_start"];
	$year_end = $_POST["year_end"];
	$salary = $_POST["salary"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	
	if($rs_user = @mysql_fetch_array($result_user)){
		$sql_experiences="
			INSERT INTO `buildthedot_thaijobhd_user_history_experiences`
			(`user_account_id`, `job_position`, `company_name`, `year_start`, `year_end`, `salary`)
			VALUE
			('".$_SESSION["userid"]."', '{$job_position}', '{$company_name}', '{$year_start}', '{$year_end}', '{$salary}') ;
		";
		@mysql_query($sql_experiences);
		?><form id="add_education_message_form" action="<?php echo $rootpath; ?>add-experience.php" method="POST">
			<input type="hidden" id="add_education_messaage" name="add_education_messaage" value="" />
		</form>
		<script>
			document.getElementById("add_education_message_form").submit();
		</script> 
<?php
	}
}
?>