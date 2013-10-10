<?php
// session_start();
// $rootpath ="../../../";
// $rootadminpath ="../../";
unset($_SESSION["userid"]);
header("location: {$rootadminpath}job.php");
?>