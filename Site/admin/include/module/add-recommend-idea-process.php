<?php 
@session_start();
$rootpath ="../../../";
$rootadminpath ="../../";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");
if($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	include ("include/footer.php");
}
else{
	// $CompanyID = $_POST["CompanyID"];
	$MainIdea = $_POST["MainIdea"];
	$Description1 = $_POST["Description1"];
	$Description2 = $_POST["Description2"];
	$Description3 = $_POST["Description3"];
	$Description4 = $_POST["Description4"];
	$Description5 = $_POST["Description5"];
	$Description6 = $_POST["Description6"];
	$Description7 = $_POST["Description7"];
	$Description8 = $_POST["Description8"];
	$Description9 = $_POST["Description9"];
	$Description10 = $_POST["Description10"];
	$IdeaRecomment = $_POST["IdeaRecomment"];
	$time_now = date('Y-m-d H:i:s', strtotime("now"));//date('Y-m-d H:i:s', $time_now)
	
	$sql="
		INSERT INTO `buildthedot_thaijobhd_job_idea`
		(`MainIdea`, `Description1`, `Description2`, `Description3`, `Description4`, `Description5`, `Description6`, `Description7`, `Description8`, `Description9`, `Description10` `IdeaRecomment`, `IdeaTime`) 
		VALUE('{$MainIdea}', '{$Description1}', '{$Description2}', '{$Description3}', '{$Description4}', '{$Description5}', '{$Description6}', '{$Description7}', '{$Description8}', '{$Description9}', '{$Description10}', '{$IdeaRecomment}', '{$time_now}');
	";
	@mysql_query($sql);
	$CompanyID = @mysql_insert_id();
	
	if(file_exists($_FILES['pic1']['tmp_name']) && is_uploaded_file($_FILES['pic1']['tmp_name'])){
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	if(file_exists($_FILES['pic2']['tmp_name']) && is_uploaded_file($_FILES['pic2']['tmp_name'])){
		include($rootadminpath."include/module/edit-recommend-idea-process3.php");
	}
	if(file_exists($_FILES['pic3']['tmp_name']) && is_uploaded_file($_FILES['pic3']['tmp_name'])){
		include($rootadminpath."include/module/edit-recommend-idea-process4.php");
	}
	// header("Location: {$rootadminpath}business-idea.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>business-idea.php";
	</script><?php
}