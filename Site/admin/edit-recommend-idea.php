<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include($rootadminpath."include/connect-to-database.php");
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
						<h1>ไอเดียธุรกิจ <span>- Lorem Ipsum </span><span class="text-black">- แก้ไข </span></h1>
					</div>
					<div id="" class="container_12">
						<form id="form-edit" action="<?php echo $rootadminpath; ?>include/module/edit-recommend-idea-process.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="CompanyID" value="<?php echo $_GET["CompanyID"]; ?>" />
							<section>
<?php
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_job_idea` 
									WHERE `CompanyID` = '".$_GET["CompanyID"]."';
								";
								$result=@mysql_query($sql);
								if($rs=@mysql_fetch_array($result)){
?>
									<div class="grid_2">
										<h6 class="detail-title">หัวข้อ</h6>
									</div>
									<div class="grid_8">
										<p>
											<input type="text" id="name" name ="MainIdea" class="round" value="<?php echo $rs["MainIdea"]; ?>"/>
										</p>
									</div>
									<br class="clear"/>
									
									<div class="grid_2">
										<h6 class="detail-title">Headline</h6>
									</div>
									<div class="grid_8">
										<p>
											<textarea id="name" id="Headline" name ="Headline" class="round"><?php echo $rs["Headline"]; ?></textarea>
										</p>
									</div>
									<br class="clear"/>
									
									<div class="grid_2">
										<h6 class="detail-title">ย่อหน้า</h6>
									</div>
									<div class="grid_10">
										<p>
											<textarea type="text" id="Description" name ="Description" class="round ckeditor"><?php echo $rs["Description"]; ?></textarea>
										</p>
									</div>
									<br class="clear"/>
									
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 1 </h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_4">
											<p>
<?php
												if ($rs["Pic1"]=="") {

													?><img src="<?php echo $rootpath; ?>images/banner-2.png" /><?php
												}else{
?>
												<a href="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic1"]; ?>" target="_blank" ><img src="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic1"]; ?>" width="200" /></a>
<?php
												}
?>
											</p>
										</div>
										<div class="grid_8">
											<p>
												<input type="file" name="pic1" class="button round black" />
											</p>
										</div>
										<br class="clear"/>
									</div>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 2</h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_4">
											<p>
<?php
												if ($rs["Pic2"]=="") {

													?><img src="<?php echo $rootpath; ?>images/banner-2.png" /><?php
												}else{
?>
												<a href="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic2"]; ?>" target="_blank" ><img src="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic2"]; ?>" width="200" /></a>
<?php
												}
?>
											</p>
										</div>
										<div class="grid_8">
											<p>
												<input type="file" name="pic2" class="button round black" />
											</p>
										</div>
										<br class="clear"/>
									</div>
									<div class="grid_2">
										<h6 class="detail-title pic-post">รูปที่ 3 </h6>
									</div>
									<div class="prefix_2" id="prefix_2">
										<div class="grid_4">
											<p>
<?php
												if ($rs["Pic3"]=="") {

													?><img src="<?php echo $rootpath; ?>images/banner-2.png" /><?php
												}else{
?>
													<a href="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic3"]; ?>" target="_blank" ><img src="<?php echo $rootpath; ?>images/business-idea/<?php echo $rs["Pic3"]; ?>" width="200" /></a>
<?php
												}
?>
											</p>
										</div>
										<div class="grid_8">
											<p>
												<input type="file" name="pic3" class="button round black" />
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
												<input type="radio" id="status" name="IdeaRecomment" value="1" <?php 
													if ($rs["IdeaRecomment"]==1) {
														echo "checked=\"checked\"";
													}
												?> />
												Active 
											</label>
											<label for="inactive" class="alt-label">
												<input type="radio" id="status" name="IdeaRecomment" value="0" <?php 
													if ($rs["IdeaRecomment"]==0) {
														echo "checked=\"checked\"";
													}
												?> />
												Inactive
											</label>
										</p>
									</div>
									<br class="clear"/>
<?php
								}
?>
							</section>
							<div class="center">
								<a href="#" class="save-button blue round" onclick="document.getElementById('form-edit').submit(); ">บันทึก</a>
							</div>
						</form>
					</div>
		
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