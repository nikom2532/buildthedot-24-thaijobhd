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
	$CompanyID = $_GET["CompanyID"];
	$time_now = strtotime("now");
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_top_company` 
		WHERE `TopCompanyID` = '{$CompanyID}' ;
	";
	$result = @mysql_query($sql);
	while ($rs = @mysql_fetch_array($result)) {
		if($rs["CompanyPic"]!=""){
			unlink($rootpath."images/top_company/".$rs["CompanyPic"]);
		}
	}
	
	$sql="
		DELETE FROM `buildthedot_thaijobhd_top_company` 
		WHERE `TopCompanyID` = '{$CompanyID}' ;
	";
	@mysql_query($sql);
	// header("Location: {$rootadminpath}top-company.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>top-company.php";
	</script><?php
}