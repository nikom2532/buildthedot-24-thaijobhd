<?php
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$topic = $_POST["topic"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_POST["userID"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	if($rs_user = @mysql_fetch_array($result_user)){
		@mysql_query("SET NAMES 'utf8'");
		$sql_talent_others_check="
			SELECT * 
			FROM  `buildthedot_thaijobhd_user_history_talent_others` 
			WHERE `user_account_id` = '".$_POST["userID"]."'
		";
		$result_talent_others_check = @mysql_query($sql_talent_others_check);
		if($rs_talent_others_check = @mysql_fetch_array($result_talent_others_check)){
			$sql_talent_others_update="
				UPDATE `buildthedot_thaijobhd_user_history_talent_others` 
				SET `topic` =  '{$topic}' 
				WHERE `user_account_id` = '".$_POST["userID"]."' ;
			";
			@mysql_query($sql_talent_others_update);
		}
		else{
			$sql_talent_others_insert="
				INSERT INTO `buildthedot_thaijobhd_user_history_talent_others`
				(`user_account_id`, `topic`)
				VALUE
				('".$_POST["userID"]."', '{$topic}') ;
			";
			@mysql_query($sql_talent_others_insert);
		}
		?><form id="add_talent_language_message_form" action="<?php echo $rootadminpath; ?>add-talent.php?userID=<?php echo $_POST["userID"]; ?>" method="POST">
			<input type="hidden" id="add_talent_language_messaage" name="add_talent_language_messaage" value="" />
		</form>
		<script>
			document.getElementById("add_talent_language_message_form").submit();
		</script><?php
	}
}
?>