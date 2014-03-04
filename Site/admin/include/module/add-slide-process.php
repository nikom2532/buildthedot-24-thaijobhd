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
				$images = $_FILES["SlidePic"]["tmp_name"];
				
				$width=950; //*** Fix Width & Heigh (Autu caculate) ***//
				
				$size=GetimageSize($images);
				
				$height= 280;//round($width*$size[1]/$size[0]);
				
				$images_orig = ImageCreateFromJPEG($images);
				
				$photoX = ImagesX($images_orig);
				
				$photoY = ImagesY($images_orig);
				
				$images_fin = ImageCreateTrueColor($width, $height);
				
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				
				ImageJPEG($images_fin,$rootadminpath."images/slide". $_SESSION['slide_id'] .".jpg");
				
				ImageDestroy($images_orig);
				
				ImageDestroy($images_fin);
				
					
				$upload = "slide". $_SESSION['slide_id'] .".jpg";
				$sid = intval($_SESSION['slide_id']);
				//*** Insert Record ***//			
				$sql = "INSERT INTO buildthedot_thaijobhd_slide VALUES ( '{$sid}', '{$upload}');";
				$rs = mysql_query($sql);  
				if($rs)
				{
					?>
						<script type="text/javascript">
							window.location="<?php echo $rootadminpath; ?>add-slide.php?check=1&id=<?=$_SESSION['slide_id']?> ";
						</script>
					<?php
				
				}
				else 
				{
					$sql = "UPDATE buildthedot_thaijobhd_slide SET pic_name = '{$upload}' WHERE sid = '{$sid}'";
					$rs = mysql_query($sql);  
					if($rs)
					{	
						?>
							<script type="text/javascript">
								window.location="<?php echo $rootadminpath; ?>add-slide.php?check=1&id=<?=$_SESSION['slide_id']?> ";
							</script>
						<?php
					}
					else 
					{
						?>
							<script type="text/javascript">
								window.location="<?php echo $rootadminpath; ?>add-slide.php?check=2&id=<?=$_SESSION['slide_id']?> ";
							</script>
						<?php
					}	
				}		
			}
			else
			{
				?>
					<script type="text/javascript">
						window.location="<?php echo $rootadminpath; ?>add-slide.php?check=3&id=<?=$_SESSION['slide_id']?> ";
					</script>
				<?php
			}
		}
		else
		{
			?>
				<script type="text/javascript">
					window.location="<?php echo $rootadminpath; ?>add-slide.php?check=4&id=<?=$_SESSION['slide_id']?> ";
				</script>
			<?php
		}
}
?>