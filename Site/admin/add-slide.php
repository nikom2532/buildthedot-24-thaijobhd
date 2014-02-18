<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include("include/connect-to-database.php");
?>
<script src="./js/jquery-1.7.1.min.js"></script>

<script>
	$(document).ready(function(){
  		$(".table-actions-button-del").live("click",function() 
  		{ 
			if (confirm("Do you want to delete")){
     	 		id = $(this).attr('id');
     	 		$.post("include/module/delete-job-process.php",{JID : id},function(data){
     	 			if(data == true)
     	 			{
     	 				alert("Delete Complete");
     	 				  location.reload();
     	 			}
     	 			else
     	 			{
     	 				alert("Delete Uncomplete");
     	 			}
     	 		});
     	 		//$.post("include/module/delete-job-process.php",{JID = id},function(data){alert("Delete Job Sucess");});	
    		}
    		else
    		{
    			
    		}
		});
		
	});
</script>
<?php
//For Development mode(No need to login)
 $_SESSION["userid"] = "1";
if(isset($_GET["check"]))
{
	if($_GET["check"] == "1")
	{
		?>
			<script>
				alert("Upload Complete");
			</script>
		<?php
	}
	else 
	{
		?>
			<script>
				alert("Upload Error");
			</script>
		<?php	
	}
}

if ($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	//include ("include/footer.php");
} 
else {
	//check for Logout mode
	if(isset($_GET["mode"]))
	{
		if($_GET["mode"]=="logout")
		{
			include($rootadminpath."include/module/logout_process.php");
		}
	}
	
	//normal mode
	else
	{
		include($rootpath."lib/func_pagination.php");
		include($rootadminpath."include/initial/pagination.php");
		include($rootadminpath."include/top-bar.php");
		$menu="slide";
		include($rootadminpath."include/top-menu.php");
	?>
				<!-- MAIN CONTENT -->
		<div id="content">
			<div class="content-module">
				
				<div class="content-module-main">
						<div id="head-title">
							<h1>สไลท์</h1>
						</div>
						<h1>ขนาดรูปภาพ สำหรับสไลท์</h1>
						<h6>** ขนาด 950 x 280 px.</h6>
						<div id="content-detail" class="container_12">
							<form id="form-advertisement" action="<?php echo $rootadminpath; ?>include/module/add-slide-process.php" method="POST" enctype="multipart/form-data" onsubmit="return check_value_data()">
								<!-- <input type="hidden" name="adid" value="<?php echo $_GET["adid"]; ?>" /> -->
									<div class="grid_7">
										<section class="grid_7">
											<div class="grid_1">
												<h3>เลือกรูป : </h3>
											</div>
											<div class="grid_5">
												<?php
													if(isset($_GET['id']))
													{
														$_SESSION['slide_id'] = $_GET['id']; 
														$sid = $_SESSION['slide_id'];
														$sql = "SELECT * FROM buildthedot_thaijobhd_slide WHERE sid = '{$sid}' ";
														$result = @mysql_query($sql);
														$count = 1;
														while($rs = @mysql_fetch_array($result))
														{
															$pic = $rs['pic_name'];
														} 
														
														echo "รูปที่ ".$_GET['id']; 
													}
												?>
											</div>
											<br class="clear"/>
											<div class="prefix_1 grid_5">
												<input type="file" name="SlidePic" class="button round black" />
											</div>
	
										</section>
										
										<br class="clear"/>
									</div>
								<section class="grid_4">
									<?php 
										if(isset($pic))
										{
											?>
												<img src="images/<?php echo $pic; ?>" width="600" height="175">   
											<?php
										}
										else {
											?>
												<img src="images/banner-1.png" width="600" height="175">   
											<?php
										}
									?>
									
								</section>
								<br class="clear"/>
						
											
						</div>
						<!-- เอามาสร้างบรรทัดเฉยๆ ไม่มีอะไร -->
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
						<!-- ถึงตรงนี้นะครับ  -->
						<input type="submit" id="" class="save-button blue round" value = "บันทึก">
					
							</form>
						      
				</div> <!-- end content-module-main -->
			</div> <!-- end content-module -->
		</div> <!-- end content -->
			<?php					
	}
}
?>

	