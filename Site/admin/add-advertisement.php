<script type="text/javascript">
	function check_value_data()
	{
		var AdLink = document.getElementById("AdLink").value;
		if(AdLink == "" || AdLink == null)
		{
			alert("Link idea name is not valid");
			return false;
		}

	}
</script>
<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
//include($rootpath."include/opendb.php");
include($rootadminpath."include/connect-to-database.php");
//$_SESSION["userid"] = "";
if($_SESSION["userid"] == "") {
	include ($rootadminpath . "include/login.php");
	include ("include/footer.php");
}
else{
	//check for Logout mode
	if($_GET["mode"]=="logout"){
		include($rootadminpath."include/module/logout_process.php");
	}
	//normal mode
	else{
		include($rootadminpath."include/top-bar.php");
?>
	<!-- HEADER -->
		<div id="header-with-tabs">
			<div class="page-full-width cf">
				<ul id="tabs" class="left">
					<li><a href="<?php echo $rootadminpath; ?>job.php">งาน</a></li>
					<li><a href="<?php echo $rootadminpath; ?>business-idea.php">ไอเดียธุรกิจ</a></li>
					<li><a href="<?php echo $rootadminpath; ?>advertisement.php" class="active-tab">โฆษณา</a></li>
					<li><a href="<?php echo $rootadminpath; ?>top-company.php">บริษัทชั้นนำ</a></li>
				</ul> <!-- end tabs -->
				<!-- company logo -->
				
			</div> <!-- end full-width -->
		</div> <!-- end header -->
			
		<!-- MAIN CONTENT -->
		<div id="content">
			<div class="content-module">
				
				<div class="content-module-main">
						<div id="head-title">
							<h1>โฆษณา </h1>
						</div>
						<h2>Content Ads</h2>
						<h6>** ขนาด 200*200 px.</h6>
						<h2>Side Ads</h2>
						<h6>** ขนาด 350*200 px.</h6>
						<div id="content-detail" class="container_12">
							<form id="form-advertisement" action="<?php echo $rootadminpath; ?>include/module/add-advertisement-process.php" method="POST" enctype="multipart/form-data" onsubmit="return check_value_data()">
								<!-- <input type="hidden" name="adid" value="<?php echo $_GET["adid"]; ?>" /> -->
									<div class="grid_7">
										<section class="grid_7">
											<div class="grid_1">
												<h6>เลือกรูป</h6>
											</div>
											<div class="grid_5">
												<a href="#">Image name</a>
											</div>
											<br class="clear"/>
											<div class="prefix_1 grid_5">
												<input type="file" name="AdPic" class="button round black" />
											</div>
											<h5 class="prefix_1 grid_5 tall10">
												Choose Ad type:
											</h5>
											<div class="prefix_1 grid_5">
												<input type="radio" name="ad_type" id="ad_type1" class="radio round black inline tall5" value="Content_Ads" />
    										<label for="ad_type1">Content Ads</label>
    										<input type="radio" name="ad_type" id="ad_type2" class="radio round black inline tall5" value="Side_Ads" />
    										<label for="ad_type2">Side Ads</label>
											</div>
											<h5 class="prefix_1 grid_5 tall10">
												<span class="grid_2">
													Choose Position:
												</span>
												<span class="grid_2">
	    										<select name="ad_position" id="ad_content_position">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
													<select name="ad_position" id="ad_side_position">
<?php
														for($init=1; $init<=10; $init++){
?>
															<option value="<?php echo $init; ?>" <?php if($rs["AdPosition"]==$init){ echo "selected"; } ?>><?php echo $init; ?></option>
<?php
														}
?>
													</select>
												</span>
											</h5>
											<br class="clear"/>
											<div class="prefix_1 grid_5">
												Link URL:
											</div>
											<div class="prefix_1 grid_5">
												<input type="text" id="AdLink" name ="AdLink" class="round" value=""/>
											</div><br class="clear"/>
											<div class="grid_6 center">
												<!--a href="#" onclick="document.getElementById('form-advertisement').submit();" class="save-button blue round">บันทึก</a-->
												
											</div>
										</section>
										
										<br class="clear"/>
									</div>
								<section class="grid_4">
									<img src="images/banner-1.png" width="600" height="175">   
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
		include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>