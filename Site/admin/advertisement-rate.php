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
		include($rootpath."lib/func_pagination.php");
		include($rootadminpath."include/initial/pagination.php");
		include($rootadminpath."include/top-bar.php");
		
		$menu="advertisement-rate";
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
<?php
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_detail` 
								;";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<div class="grid_2">
										<h6 class="detail-title"><?php echo $rs["title"]; ?></h6>
									</div>
									<div class="grid_8">
										<p>
											<input type="text" id="<?php echo $rs["title"]; ?>" name ="<?php echo $rs["title"]; ?>" class="round" value="<?php echo $rs["detail"]; ?>"/>
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
					
				</div> <!-- end content-module-main -->
			</div> <!-- end content-module -->
		</div> <!-- end content -->
<?php
	include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>