<?php
// session_start();
// $rootpath ="../../../";
 $rootadminpath ="../../";
session_start();
unset($_SESSION["userid"]);
// header("location: {$rootadminpath}job.php");
?>
<script type="text/javascript">
	window.location="<?php echo $rootadminpath; ?>index.php";
</script><?php
?>