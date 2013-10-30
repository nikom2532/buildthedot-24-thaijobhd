<?php
session_start();
$rootpath ="../../";
$rootadminpath ="../../admin/";
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$topic = $_POST["topic"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	if($rs_user = @mysql_fetch_array($result_user)){
		@mysql_query("SET NAMES 'utf8'");
		$sql_talent_others="
			INSERT INTO `buildthedot_thaijobhd_user_history_talent_others`
			(`user_account_id`, `topic`)
			VALUE
			('".$_SESSION["userid"]."', '{$topic}') ;
		";
		@mysql_query($sql_talent_others);
		?><form id="add_talent_language_message_form" action="<?php echo $rootpath; ?>add-talent.php" method="POST">
			<input type="hidden" id="add_talent_language_messaage" name="add_talent_language_messaage" value="" />
		</form>
		<script>
			document.getElementById("add_talent_language_message_form").submit();
		</script> 
<?php
	}
}
?>