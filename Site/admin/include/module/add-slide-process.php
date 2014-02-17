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
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["SlidePic"]["name"]);
		$extension = end($temp);
		if ((($_FILES["SlidePic"]["type"] == "image/gif")
		|| ($_FILES["SlidePic"]["type"] == "image/jpeg")
		|| ($_FILES["SlidePic"]["type"] == "image/jpg")
		|| ($_FILES["SlidePic"]["type"] == "image/pjpeg")
		|| ($_FILES["SlidePic"]["type"] == "image/x-png")
		|| ($_FILES["SlidePic"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts))
		{	
			if(copy($_FILES["SlidePic"]["tmp_name"],$rootadminpath."images/slide". $_SESSION['slide_id'] .".jpg"))
			{	
				echo "Copy/Upload Complete<br>";
				$upload = "slide". $_SESSION['slide_id'] .".jpg";
				$sid = intval($_SESSION['slide_id']);
				//*** Insert Record ***//
				
				$cn = mysql_connect("localhost","root","");
				$objQuery1 = mysql_select_db("buildthe_thaijobhd",$cn);
			
				echo json_encode($objQuery1);
				
				$sql = "INSERT INTO buildthedot_thaijobhd_slide VALUES ( '{$sid}', '{$upload}');";
				$rs = mysql_query($sql);  
				if($rs)
				{
					echo "1";
				}
				else 
				{
					echo "2";
				}		
			}
			else
			{
				echo "3";
			}
		}
		else
		{
			echo "4";
		}
}
?>