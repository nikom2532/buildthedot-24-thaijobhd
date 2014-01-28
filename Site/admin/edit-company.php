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
		
		$menu="top-company";
		include($rootadminpath."include/top-menu.php");
?>
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<div class="content-module">
	
			<div class="content-module-main">
				<div id="head-title">
					<h1>บริษัทชั้นนำ <span>- Lorem Ipsum </span><span class="text-black">- แก้ไข </span></h1>
				</div>
				<div id="content-detail" class="container_12">
					<section>
						<form id="form-add-company" action="<?php echo $rootadminpath; ?>include/module/edit-company-process.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="company_id" value="<?php echo $_GET["company_id"]; ?>" />
<?php
							$sql="
								SELECT * 
								FROM  `buildthedot_thaijobhd_top_company` 
								WHERE `TopCompanyID` = '".$_GET["company_id"]."';
							";
							$result=@mysql_query($sql);
							if($rs=@mysql_fetch_array($result)){
?>
								<div class="grid_2">
									<h6 class="detail-title"> ชื่อบริษัท</h6>
								</div>
								<div class="grid_8">
									<p>
										<input type="text" id="title" name ="title" class="round" value="<?php echo $rs["TopCompanyName"]; ?>"/>
									</p>
								</div>
								<br class="clear"/>
								<div class="grid_2">
									<h6 class="detail-title">เลือกรูป (ขนาด 144 x 144)</h6>
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
										<input type="text" id="LinkAddress" name ="LinkAddress" class="round" value="<?php echo $rs["LinkAddress"]; ?>" />
									</p>
								</div>
								<br class="clear"/>
								<div class="grid_2">
									<h6 class="detail-title">Status</h6>
								</div>
								<div class="grid_8">
									<p>
										<label for="Status1" class="alt-label">
											<input type="radio" id="Status1" name="Status" value="1" <?php 
												if($rs["Status"]=="1"){
													echo "checked=\"checked\"";
												}
											?> />
											Active 
										</label>
										<label for="Status2" class="alt-label">
											<input type="radio" id="Status2" name="Status" value="0" <?php 
												if($rs["Status"]=="0"){
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
						</form>
					</section>
				</div>
				<div class="center">
					<a href="#" onclick="document.getElementById('form-add-company').submit();" class="save-button blue round">บันทึก</a>
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