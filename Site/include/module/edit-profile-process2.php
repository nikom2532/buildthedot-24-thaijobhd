<?php
//########## Delete old image file ####
$sql="
	SELECT `profile_picture`
	FROM `buildthedot_thaijobhd_user_account` 
	WHERE `id` = '".$_SESSION["userid"]."' ;
";
$result=@mysql_query($sql);
if($rs=@mysql_fetch_array($result)){
	if($rs["profile_picture"] != ""){
		unlink($rootpath."images/user_account/".$rs["profile_picture"]);
	}
}

$target_path = $rootpath."images/user_account/";
$filename = "user_".$_SESSION["userid"]."_".$time_now."_".basename($_FILES["profile_picture"]['name']);
$target_path = $target_path . $filename;

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["profile_picture"]["name"]);
$extension = end($temp);
if ((($_FILES["profile_picture"]["type"] == "image/gif")
|| ($_FILES["profile_picture"]["type"] == "image/jpeg")
|| ($_FILES["profile_picture"]["type"] == "image/jpg")
|| ($_FILES["profile_picture"]["type"] == "image/pjpeg")
|| ($_FILES["profile_picture"]["type"] == "image/x-png")
|| ($_FILES["profile_picture"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)){
	if ($_FILES["profile_picture"]["error"] > 0) {
		echo "Error: " . $_FILES["profile_picture"]["error"] . "<br />";
	} else {
		if (move_uploaded_file($_FILES["profile_picture"]['tmp_name'], $target_path)) {
			// echo "The file " . basename($_FILES["profile_picture"]['name']) . " has been uploaded";
			$sql="
				UPDATE `buildthedot_thaijobhd_user_account` 
				SET `profile_picture` = '".$filename."'
				WHERE `id` = '".$_SESSION["userid"]."' ;
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