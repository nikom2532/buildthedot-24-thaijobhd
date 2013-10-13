<?php
//########## Delete old image file ####
$sql="
	SELECT `CompanyPic`
	FROM `buildthedot_thaijobhd_top_company` 
	WHERE `TopCompanyID` = '{$company_id}' ;
";
$result=@mysql_query($sql);
if($rs=@mysql_fetch_array($result)){
	if($rs["CompanyPic"] != ""){
		unlink($rootpath."images/top_company/".$rs["CompanyPic"]);
	}
}

//########## Write File ###############
$target_path = $rootpath."images/top_company/";

//Remove whitespace
$filename = preg_replace('/\s+/', '', basename($_FILES["CompanyPic"]['name']));
$filename = str_replace(" ", "", $filename);

$filename = "tc_".$_SESSION["userid"]."_".$company_id."_".$title."_".$time_now."_".$filename;
$target_path = $target_path . $filename;

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["CompanyPic"]["name"]);
$extension = end($temp);
if ((($_FILES["CompanyPic"]["type"] == "image/gif")
|| ($_FILES["CompanyPic"]["type"] == "image/jpeg")
|| ($_FILES["CompanyPic"]["type"] == "image/jpg")
|| ($_FILES["CompanyPic"]["type"] == "image/pjpeg")
|| ($_FILES["CompanyPic"]["type"] == "image/x-png")
|| ($_FILES["CompanyPic"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)){
	if ($_FILES["CompanyPic"]["error"] > 0) {
		echo "Error: " . $_FILES["CompanyPic"]["error"] . "<br />";
	} else {
		if (move_uploaded_file($_FILES["CompanyPic"]['tmp_name'], $target_path)) {
			echo "The file " . basename($_FILES["CompanyPic"]['name']) . " has been uploaded";
			echo $sql="
				UPDATE `buildthedot_thaijobhd_top_company` 
				SET `CompanyPic` = '".$filename."'
				WHERE `TopCompanyID` = '{$company_id}' ;
			";
			@mysql_query($sql);
		} 
		else {
			echo "There was an error uploading the file, please try again!";
		}
	}
} else {
	echo "Invalid file";
}
?>