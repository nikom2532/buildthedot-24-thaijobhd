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
	echo copy($_FILES["SlidePic"]["tmp_name"],"myfile/".$_FILES["SlidePic"]["name"]);
		/*if(copy($_FILES["SlidePic"]["tmp_name"],"myfile/".$_FILES["SlidePic"]["name"]))
		{
			echo "Copy/Upload Complete<br>";
	
			//*** Insert Record ***
			$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
			$objDB = mysql_select_db("files");
			$strSQL = "INSERT INTO files ";
			$strSQL .="(Name,FilesName) VALUES ('".$_SESSION['slide_id']."','".$_FILES["filUpload"]["name"]."')";
			$objQuery = mysql_query($strSQL);
			if($objQuery)
			{
				echo ":)";
			}		
		}*/
	/*
	// $AdPic = $_POST["AdPic"];
	$AdLink = $_POST["AdLink"];
	$ad_type = $_POST["ad_type"];
	$ad_position = $_POST["ad_position"];
	$time_now = strtotime("now");	//.date('Y-m-d H:i:s', $time_now)
	
	$sql="
		SELECT * 
		FROM  `buildthedot_thaijobhd_slide`
		WHERE  
	";
	$result = @mysql_query($sql);
	if($rs = @mysql_fetch_array($result)){
		$sql2="
			UPDATE `buildthedot_thaijobhd_ad` 
			SET 
				`AdLink` = '".$AdLink."'
			WHERE 
				`AdType` = '".$ad_type."'
				AND `AdPosition` = '".$ad_position."';
		";
		@mysql_query($sql2);
		$adid=$rs["PictureID"];
	}
	else{
		$sql2="
			INSERT INTO `buildthedot_thaijobhd_ad` 
			(`AdLink`, `AdType`, `AdPosition`)
			VALUE
			('{$ad_position}') ;
		";
		@mysql_query($sql2);
		$adid = @mysql_insert_id();
	}
	
	if(file_exists($_FILES['AdPic']['tmp_name']) && is_uploaded_file($_FILES['AdPic']['tmp_name'])){
		//echo $_FILES['pic1']['tmp_name'];
		include($rootadminpath."include/module/edit-advertisement-process2.php");
	}
	// header("Location: {$rootadminpath}advertisement.php");
	?><script type="text/javascript">
		window.location="<?php echo $rootadminpath; ?>advertisement.php";
	</script><?php*/
}