<?php
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include ($rootadminpath . "include/connect-to-database.php");
// include ($rootpath . "include/top-menu.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$user_history_experiences_id = $_POST["user_history_experiences_id"];
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
		$sql_edu="
			UPDATE `buildthedot_thaijobhd_user_history_experiences` 
			SET
			`job_position` =  '{$job_position}' ,
			`company_name` = '{$company_name}' ,
			`year_start` = '{$year_start}' ,
			`year_end` = '{$year_end}' ,
			`salary` = '{$salary}'
			WHERE `user_account_id` = '".$_SESSION["userid"]."'
			AND `user_history_experiences_id` = '{$user_history_experiences_id}' ;
		";
		@mysql_query($sql_edu);
		?><form id="edit_education_message_form" action="<?php echo $rootadminpath; ?>add-experience.php?userID=<?php echo $_POST["userID"]; ?>" method="POST">
			<input type="hidden" id="add_education_messaage" name="add_education_messaage" value="" />
		</form>
		<script>
			document.getElementById("edit_education_message_form").submit();
		</script> 
<?php
	}
}
?>