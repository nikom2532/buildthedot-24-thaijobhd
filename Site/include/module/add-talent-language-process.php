<?php
session_start();
$rootpath ="../../";
$rootadminpath ="../../admin/";
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
	$language = $_POST["language"];
	$score_speaking = $_POST["score_speaking"];
	$score_understanding = $_POST["score_understanding"];
	$score_reading = $_POST["score_reading"];
	$score_writing = $_POST["score_writing"];
	
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	
	if($rs_user = @mysql_fetch_array($result_user)){
		$sql_talent_language="
			INSERT INTO `buildthedot_thaijobhd_user_history_talent_languages`
			(`user_account_id`, `language`, `score_speaking`, `score_understanding`, `score_reading`, `score_writing`)
			VALUE
			('".$_SESSION["userid"]."', '{$language}', '{$score_speaking}', '{$score_understanding}', '{$score_reading}', '{$score_writing}') ;
		";
		@mysql_query($sql_talent_language);
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