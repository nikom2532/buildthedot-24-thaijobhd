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
	
	$title = $_POST["title"];
	$LinkAddress = "http://".$_POST["LinkAddress"];
	$Status = $_POST["Status"];
	$time_now = strtotime("now");	//date('Y-m-d H:i:s', $time_now)
	
	$sql="
		SELECT *
		FROM `buildthedot_thaijobhd_top_company`
		WHERE `TopCompanyName` = '{$title}' ;
	";
	$result = @mysql_query($sql);
	if($rs = @mysql_fetch_array($result)){
		$sql2="
			UPDATE `buildthedot_thaijobhd_top_company` 
			SET 
				`LinkAddress` = '".$LinkAddress."'
				`Time` = '".date('Y-m-d H:i:s', $time_now)."'
			WHERE 
				`TopCompanyName` = '".$title."' ;
		";
		@mysql_query($sql2);
		$company_id=$rs["TopCompanyID"];
	}
	else{
		$sql2="
			INSERT INTO `buildthedot_thaijobhd_top_company` 
			(`TopCompanyName`, `LinkAddress`, `Status`, `Time`)
			VALUE
			('{$title}', '{$LinkAddress}', '{$Status}', '".date('Y-m-d H:i:s', $time_now)."') ;
		";
		@mysql_query($sql2);
		$company_id = @mysql_insert_id();
	}
	
	if(file_exists($_FILES['CompanyPic']['tmp_name']) && is_uploaded_file($_FILES['CompanyPic']['tmp_name'])){
		include($rootadminpath."include/module/edit-company-process2.php");
	}
	// header("Location: {$rootadminpath}top-company.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>top-company.php";
	</script><?php
}