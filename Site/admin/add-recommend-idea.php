<script type="text/javascript">
	function check_value_data()
	{
		var MainIdea = document.getElementById("MainIdea").value;
		if(MainIdea == "" || MainIdea == null)
		{
			alert("Main idea name is not valid");
			return false;
		}
		
		var Description1 = document.getElementById("Description1").value;
		if(Description1 == "" || Description1 == null) 
		{
			alert("Description is not valid");
			return false;
		}
		
		var Description2 = document.getElementById("Description2").value;
		if(Description2 == "" || Description2 == null) 
		{
			alert("Description is not valid");
			return false;
		}
		
		
		var Description3 = document.getElementById("Description3").value;
		if(Description3 == "" || Description3 == null) 
		{
			alert("Description is not valid");
			return false;
		}
		
	}
</script>
<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");
include("include/header2.php");
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
					<li><a href="<?php echo $rootadminpath; ?>business-idea.php" class="active-tab">ไอเดียธุรกิจ</a></li>
					<li><a href="<?php echo $rootadminpath; ?>advertisement.php">โฆษณา</a></li>
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
						<h1>ไอเดียธุรกิจ <span>- Lorem Ipsum </span><span class="text-black">- แก้ไข </span></h1>
					</div>
					<div id="" class="container_12">
						<section>
						<form id="form-edit" action="<?php echo $rootadminpath; ?>include/module/add-recommend-idea-process.php" method="POST" enctype="multipart/form-data" onsubmit="return check_value_data()">
							<input type="hidden" name="CompanyID" value="<?php echo $_GET["CompanyID"]; ?>" />
							
									<div class="grid_2">
										<h6 class="detail-title">หัวข้อ</h6>
									</div>
									<div class="grid_8">
										<p>
											<input type="text" id="MainIdea" name ="MainIdea" class="round" value=""/>
										</p>
									</div>
									<br class="clear"/>
									<div class="grid_2">
										<h6 class="detail-title">ย่อหน้าที่ 1</h6>
									</div>
									<div class="grid_8">
										<p>
											<textarea type="text" id="Description1" name ="Description1" class="round" value=""></textarea>
										</p>
									</div>
									<br class="clear"/>
									<div class="grid_2">
										<h6 class="detail-title">ย่อหน้าที่ 2</h6>
									</div>
									<div class="grid_8">
										<p>
											<textarea type="text" id="Description2" name ="Description2" class="round" value=""></textarea>
										</p>
									</div>
									<br class="clear"/>
									<div class="grid_2">
										<h6 class="detail-title">ย่อหน้าที่ 3</h6>
									</div>
									<div class="grid_8">
										<p>
											<textarea type="text" id="Description3" name ="Description3" class="round" value=""></textarea>
										</p>
									</div>
									<br class="clear"/>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 1 </h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_12">
											<p>
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic1" class="button round black right" />
											</p>
										</div>
										<br class="clear"/>
									</div>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 2</h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_12">
											<p>
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic2" class="button round black right" />
											</p>
										</div>
										<br class="clear"/>
									</div>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 3 </h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_12">
											<p>
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic3" class="button round black right" />
											</p>
										</div>
										<br class="clear"/>
									</div>
									<div class="grid_2">
										<h6 class="detail-title">ไอเดียแนะนำ</h6>
									</div>
									
									<div class="grid_8">
										<p>
											<label for="active" class="alt-label">
												<input type="radio" id="status" name="IdeaRecomment" value="1" />
												Active 
											</label>
											<label for="inactive" class="alt-label">
												<input type="radio" id="status" name="IdeaRecomment" value="0" />
												Inactive
											</label>
										</p>
									</div>
									<br class="clear"/>
							</section>
						
							<div class="grid_12 center"><input type="submit" id="" class="save-button blue round" value = "บันทึก"></div>
								<!--div class="center">
								<a href="#" class="save-button blue round" onclick="document.getElementById('form-edit').submit(); ">บันทึก</a>
							</div-->
					</div>
						</form>
					
		
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