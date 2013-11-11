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
	$adid = $_POST["adid"];
	// $AdPic = $_POST["AdPic"];
	
	function startsWith($haystack, $needle){
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}
	function endsWith($haystack, $needle){
	    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}
	if(startsWith($_POST["AdLink"], "http://") ){
		$AdLink = $_POST["AdLink"];
	}
	else{
		$AdLink = "http://".$_POST["AdLink"];
	}
	// $AdLink = $_POST["AdLink"];
	$ad_type = $_POST["ad_type"];
	$ad_position = $_POST["ad_position"];
	$time_now = strtotime("now");
	$sql="
		UPDATE `buildthedot_thaijobhd_ad` 
		SET 
		`AdLink` = '".$AdLink."',
		`AdType` = '".$ad_type."',
		`AdPosition` = '".$ad_position."'
		WHERE `PictureID` = '{$adid}' ;
	";
	@mysql_query($sql);
	
	if(file_exists($_FILES['AdPic']['tmp_name']) && is_uploaded_file($_FILES['AdPic']['tmp_name'])){
		$sql="
			SELECT `AdPic`
			FROM  `buildthedot_thaijobhd_ad` 
			WHERE `PictureID` = '{$adid}' ;
		";
		$result=@mysql_query($sql);
		if($rs=@mysql_fetch_array($result)){
			if($rs["AdPic"] != ""){
				unlink($rootpath."images/ad/".$rs["AdPic"]);
			}
		}
		include($rootadminpath."include/module/edit-advertisement-process2.php");
	}
	// header("Location:".$rootadminpath."advertisement.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>advertisement.php";
	</script><?php
}
?>