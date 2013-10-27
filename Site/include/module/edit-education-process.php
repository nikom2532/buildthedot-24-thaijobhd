<?php
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
	$education_level = $_POST["education_level"];
	$Institution = $_POST["Institution"];
	$year_start = $_POST["year_start"];
	$year_end = $_POST["year_end"];
	$educational_background = $_POST["educational_background"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	
	if($rs_user = @mysql_fetch_array($result_user)){
	echo	$sql_edu="
			UPDATE `buildthedot_thaijobhd_user_history_educations` 
			SET
			`education_level` =  '{$education_level}' ,
			`Institution` = '{$Institution}' ,
			`year_start` = '{$year_start}' ,
			`year_end` = '{$year_end}' ,
			`educational_background` = '{$educational_background}'
			WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
		";
		@mysql_query($sql_edu);
		?><form id="edit_education_message_form" action="<?php echo $rootpath; ?>add-education.php" method="POST">
			<input type="hidden" id="add_education_messaage" name="add_education_messaage" value="" />
		</form>
		<script>
			document.getElementById("edit_education_message_form").submit();
		</script> 
<?php
	}
}
?>