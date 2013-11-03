<?php
// session_start();
// $rootpath ="../../../";
//$rootadminpath = "../../";
unset($_SESSION["userid"]);
// header("location: {$rootadminpath}job.php");
?><script type="text/javascript">
	window.location="<?php echo $rootadminpath; ?>"+"job.php";
</script><?php
?>