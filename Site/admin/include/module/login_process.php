<?php
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");

$email=$_POST["email"];
$password=$_POST["password"];
if(($email!="")&&($password!="")) {
	$email = htmlspecialchars(trim($_POST["email"]),ENT_QUOTES);
	$password_source = htmlspecialchars(trim($_POST["password"]),ENT_QUOTES);
	$password = md5(sha1($password_source)).sha1(md5($password_source));
	unset($password_source);

	$SQL="
		SELECT `id`, `email`, `password`
		FROM  `buildthedot_thaijobhd_user_account` 
		WHERE  `email` =  \"{$email}\"
		AND  `password` =  \"{$password}\" ;
	";
	$result=@mysql_query($SQL);
	if($rs=@mysql_fetch_array($result)){
		echo $_SESSION["userid"]=$rs["id"];
		// header("location: {$rootadminpath}job.php");
		?><script type="text/javascript">
			window.location="<?php echo $rootadminpath; ?>job.php";
		</script><?php
	}
	else{
?>
		<form id="login_false_message" action="<?php echo $rootadminpath; ?>job.php" method="POST">
			<input type="hidden" id="login_messaage" name="login_messaage" value="login_false" />
		</form>
		<script>
			document.getElementById("login_false_message").submit();
		</script> 
<?php
	}
}
else{
?>
	<form id="login_false_message" action="<?php echo $rootadminpath; ?>job.php" method="POST">
		<input type="hidden" id="login_messaage" name="login_messaage" value="forget_formdata_login" />
	</form>
	<script>
		document.getElementById("login_false_message").submit();
	</script>
<?php
}
?>