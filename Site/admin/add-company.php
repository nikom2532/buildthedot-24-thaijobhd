<script type="text/javascript">
	function check_value_data()
	{	
		var title = document.getElementById("title").value;
		if(title == "" || title == "")
		{
			alert("Company name is not valid");
			return false;
		}
		
		var LinkAddress = document.getElementById("LinkAddress").value;
		if(LinkAddress == "" || LinkAddress == null) 
		{
			alert("Link is not valid");
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
				<li><a href="<?php echo $rootadminpath; ?>advertisement.php">โฆษณา</a></li>
				<li><a href="<?php echo $rootadminpath; ?>top-company.php" class="active-tab">บริษัทชั้นนำ</a></li>
			</ul> <!-- end tabs -->
			<!-- company logo -->
			
		</div> <!-- end full-width -->
	</div> <!-- end header -->

	<!-- MAIN CONTENT -->
	<div id="content">
	
		<div class="content-module">
	
			<div class="content-module-main">
				<div id="head-title">
					<h1>บริษัทชั้นนำ <span>- Lorem Ipsum </span><span class="text-black">- แก้ไข </span></h1>
				</div>
				<div id="content-detail" class="container_12">
					<section>
						<form id="form-add-company" action="<?php echo $rootadminpath; ?>include/module/add-company-process.php" method="POST" enctype="multipart/form-data"  onsubmit="return check_value_data()">
							
							<div class="grid_2">
								<h6 class="detail-title"> ชื่อบริษัท</h6>
							</div>
							<div class="grid_8">
								<p>
									<input type="text" id="title" name ="title" class="round" value=""/>
								</p>
							</div>
							<br class="clear"/>
							<div class="grid_2">
								<h6 class="detail-title">เลือกรูป</h6>
							</div>
							<div class="grid_8">
								<p>
									<input type="file" name="CompanyPic" />
								</p>
							</div>
							<br class="clear"/>
							<div class="grid_2">
								<h6 class="detail-title">ลิงค์</h6>
							</div>
							<div class="grid_8">
								<p>
									<input type="text" id="LinkAddress" name ="LinkAddress" class="round" value="" />
								</p>
							</div>
							<br class="clear"/>
							<div class="grid_2">
								<h6 class="detail-title">Status</h6>
							</div>
							<div class="grid_8">
								<p>
									<label for="Status1" class="alt-label">
										<input type="radio" id="Status1" name="Status" value="1" />
										Active 
									</label>
									<label for="Status2" class="alt-label">
										<input type="radio" id="Status2" name="Status" value="0" />
										Inactive 
									</label>
								</p>
							</div>
							<br class="clear"/>
						
					</section>
				<input type="submit" id="" class="save-button blue round" value = "บันทึก" />
					<div class="grid_2"><h6 class="detail-title"></h6></div><label for="Status2" class="alt-label"></label>
				</div>
				</form>
				<!--div class="center">
					<a href="#" onclick="document.getElementById('form-add-company').submit();" class="save-button blue round">บันทึก</a>
				</div-->
			</div>
			<!-- end content-module-main -->
	
		</div>
		<!-- end content-module -->
	
	</div>
	<!-- end content -->
<?php
		include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>