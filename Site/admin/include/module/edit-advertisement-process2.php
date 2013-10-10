<?php
		$target_path = $rootpath."images/ad/";
		$filename = "userimage_".$_SESSION["userid"]."_".$time_now."_".basename($_FILES["AdPic"]['name']);
		$target_path = $target_path . $filename;
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["AdPic"]["name"]);
		$extension = end($temp);
		if ((($_FILES["AdPic"]["type"] == "image/gif")
		|| ($_FILES["AdPic"]["type"] == "image/jpeg")
		|| ($_FILES["AdPic"]["type"] == "image/jpg")
		|| ($_FILES["AdPic"]["type"] == "image/pjpeg")
		|| ($_FILES["AdPic"]["type"] == "image/x-png")
		|| ($_FILES["AdPic"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts)){
			if ($_FILES["AdPic"]["error"] > 0) {
				echo "Error: " . $_FILES["AdPic"]["error"] . "<br />";
			} else {
				if (move_uploaded_file($_FILES["AdPic"]['tmp_name'], $target_path)) {
					echo "The file " . basename($_FILES["AdPic"]['name']) . " has been uploaded";
					$sql="
						UPDATE `buildthedot_thaijobhd_job_ad` 
						SET `AdPic` = '".$filename."'
						WHERE `PictureID` = '{$adid}' ;
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