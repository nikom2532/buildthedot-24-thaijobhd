<?php
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../"; 
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$user_history_educations_id = $_GET["id"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_GET["userID"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	if($rs_user = @mysql_fetch_array($result_user)){
		$sql_talent_language="
			DELETE FROM `buildthedot_thaijobhd_user_history_educations` 
			WHERE `user_history_educations_id` = '".$user_history_educations_id."'
			AND `user_account_id` = '".$_GET["userID"]."' ;
		";
		@mysql_query($sql_talent_language);
		?><form id="add_talent_language_message_form" action="<?php echo $rootadminpath; ?>add-education.php?userID=<?php echo $_GET["userID"]; ?>" method="POST">
			<input type="hidden" id="add_talent_language_messaage" name="add_talent_language_messaage" value="" />
		</form>
		<script>
			document.getElementById("add_talent_language_message_form").submit();
		</script> 
<?php
	}
}
?>