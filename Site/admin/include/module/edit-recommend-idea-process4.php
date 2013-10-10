<?php
		$target_path = $rootpath."images/business-idea/";
		$filename = "userimage_".$_SESSION["userid"]."_".$time_now."_".basename($_FILES["pic3"]['name']);
		$target_path = $target_path . $filename;
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["pic3"]["name"]);
		$extension = end($temp);
		if ((($_FILES["pic3"]["type"] == "image/gif")
		|| ($_FILES["pic3"]["type"] == "image/jpeg")
		|| ($_FILES["pic3"]["type"] == "image/jpg")
		|| ($_FILES["pic3"]["type"] == "image/pjpeg")
		|| ($_FILES["pic3"]["type"] == "image/x-png")
		|| ($_FILES["pic3"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts)){
			if ($_FILES["pic3"]["error"] > 0) {
				echo "Error: " . $_FILES["pic3"]["error"] . "<br />";
			} else {
				if (move_uploaded_file($_FILES["pic3"]['tmp_name'], $target_path)) {
					echo "The file " . basename($_FILES["pic3"]['name']) . " has been uploaded";
					$sql="
						UPDATE `buildthedot_thaijobhd_job_idea` 
						SET `Pic3` = '".$filename."'
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