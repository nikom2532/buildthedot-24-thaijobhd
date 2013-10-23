<?php
//########## Delete old image file ####
$sql="
	SELECT `Pic2`
	FROM `buildthedot_thaijobhd_job_idea` 
	WHERE `CompanyID` = '{$CompanyID}' ;
";
$result=@mysql_query($sql);
if($rs=@mysql_fetch_array($result)){
	if($rs["Pic2"] != ""){
		unlink($rootpath."images/business-idea/".$rs["Pic2"]);
	}
}

//########## Write File ###############
$target_path = $rootpath."images/business-idea/";

//Remove whitespace
$filename = preg_replace('/\s+/', '', basename($_FILES["pic2"]['name']));
$filename = str_replace(" ", "", $filename);

$filename = "bi_".$_SESSION["userid"]."_pic2_".$time_now."_".$filename;
$target_path = $target_path . $filename;

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["pic2"]["name"]);
$extension = end($temp);
if ((($_FILES["pic2"]["type"] == "image/gif")
|| ($_FILES["pic2"]["type"] == "image/jpeg")
|| ($_FILES["pic2"]["type"] == "image/jpg")
|| ($_FILES["pic2"]["type"] == "image/pjpeg")
|| ($_FILES["pic2"]["type"] == "image/x-png")
|| ($_FILES["pic2"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)){
	if ($_FILES["pic2"]["error"] > 0) {
		echo "Error: " . $_FILES["pic2"]["error"] . "<br />";
	} else {
		if (move_uploaded_file($_FILES["pic2"]['tmp_name'], $target_path)) {
			// echo "The file " . basename($_FILES["pic2"]['name']) . " has been uploaded";
			$sql="
				UPDATE `buildthedot_thaijobhd_job_idea` 
				SET `Pic2` = '".$filename."'
				WHERE `CompanyID` = '{$CompanyID}' ;
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