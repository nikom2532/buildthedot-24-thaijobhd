<?php
//########## Delete old image file ####
$target_path = $rootpath."file/resume/";
$sql="
	SELECT `resume_file`
	FROM `buildthedot_thaijobhd_user_account` 
	WHERE `id` = '".$_SESSION["userid"]."' ;
";
$result=@mysql_query($sql);
if($rs=@mysql_fetch_array($result)){
	if($rs["resume_file"] != ""){
		unlink($rootpath.$target_path.$rs["resume_file"]);
	}
}


$filename = trim(basename($_FILES["resume_file"]['name']));
$filename = str_replace(' ','-',$filename);
$filename = preg_replace( '/\s+/', ' ', $filename );
$filename = "user_".$_SESSION["userid"]."_".$time_now."_".$filename;
$target_path = $target_path . $filename;

$temp = explode(".", $_FILES["resume_file"]["name"]);
$extension = end($temp);
if ($_FILES["resume_file"]["error"] > 0) {
	echo "Error: " . $_FILES["resume_file"]["error"] . "<br />";
} else {
	if (move_uploaded_file($_FILES["resume_file"]['tmp_name'], $target_path)) {
		// echo "The file " . basename($_FILES["resume_file"]['name']) . " has been uploaded";
	echo	$sql="
			UPDATE `buildthedot_thaijobhd_user_account` 
			SET `resume_file` = '".$filename."'
			WHERE `id` = '".$_SESSION["userid"]."' ;
		";
		@mysql_query($sql);
	} 
	else {
		echo "There was an error uploading the file, please try again!";
	}
}
?>