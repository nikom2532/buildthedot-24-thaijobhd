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
	/*
?>
	<script type="text/javascript" src="<?php echo $rootpath; ?>js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: "form#form-edit textarea#Description"
		});
	</script>
<?php
	 */
?>
	<script type="text/javascript" src="<?php echo $rootpath; ?>js/ckeditor/ckeditor.js"></script>	 
<?php
	//check for Logout mode
	if($_GET["mode"]=="logout"){
		include($rootadminpath."include/module/logout_process.php");
	}
	//normal mode
	else{
		include($rootadminpath."include/top-bar.php");
		
		$menu="business-idea";
		include($rootadminpath."include/top-menu.php");
?>
		<!-- MAIN CONTENT -->
		<div id="content">
		
			<div class="content-module">
		
				<div class="content-module-main">
					<div id="head-title">
						<h1>ไอเดียธุรกิจ <span>- Lorem Ipsum </span><span class="text-black">- เพิ่ม </span></h1>
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
										<h6 class="detail-title">ย่อหน้า</h6>
									</div>
									<div class="grid_10">
										<p>
											<textarea type="text" id="Description" name ="Description" class="round ckeditor" value=""></textarea>
										</p>
									</div>
									<br class="clear"/>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 1 </h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_12">
											<p>
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic1" class="button round black " />
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
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic2" class="button round black " />
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
												<!-- <a href="#" class="button round black right">แก้ไข</a> --><input type="file" name="pic3" class="button round black " />
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
		<script src="<?php echo $rootadminpath ?>js/add-recommend-idea.js" type="text/javascript"></script>
<?php
		include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>