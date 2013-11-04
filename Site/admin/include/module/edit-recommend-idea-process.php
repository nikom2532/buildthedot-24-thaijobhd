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
	$CompanyID = $_POST["CompanyID"];
	$MainIdea = $_POST["MainIdea"];
	$Description1 = $_POST["Description1"];
	$Description2 = $_POST["Description2"];
	$Description3 = $_POST["Description3"];
	$IdeaRecomment = $_POST["IdeaRecomment"];
	$time_now = date("Y-m-d H:i:s", strtotime("now"));
	$sql="
		UPDATE `buildthedot_thaijobhd_job_idea` 
		SET `MainIdea` = '".$MainIdea."',
		 `Description1` = '".$Description1."',
		 `Description2` = '".$Description2."',
		 `Description3` = '".$Description3."',
		 `IdeaRecomment` = '".$IdeaRecomment."',
		 `IdeaTime` = '".$time_now."'
		WHERE `CompanyID` = '{$CompanyID}' ;
	";
	@mysql_query($sql);
	
	
	if(file_exists($_FILES['pic1']['tmp_name']) && is_uploaded_file($_FILES['pic1']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process2.php");
	}
	if(file_exists($_FILES['pic2']['tmp_name']) && is_uploaded_file($_FILES['pic2']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process3.php");
	}
	if(file_exists($_FILES['pic3']['tmp_name']) && is_uploaded_file($_FILES['pic3']['tmp_name'])){
		// echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-recommend-idea-process4.php");
	}
	// header("Location: {$rootadminpath}business-idea.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>business-idea.php";
	</script><?php
}