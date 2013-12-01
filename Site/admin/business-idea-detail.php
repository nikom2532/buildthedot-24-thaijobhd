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
						<h1>ไอเดียธุรกิจ<span class="text-black">- Lorem Ipsum </span></h1>
					</div>
					<h2 class="right"><a href="edit-recommend-idea.php?CompanyID=<?php echo $_GET["CompanyID"]; ?>" class="button black round">แก้ไข</a></h2>
					<div id="content-detail" class="container_12">
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
								<div class="grid_2" id="image-detail">
									<ul>
										<li><img src="images/banner-2.png" alt="pictur">
										</li>
										<li><img src="images/banner-2.png" alt="pictur">
										</li>
										<li><img src="images/banner-2.png" alt="pictur">
										</li>
									</ul>
								</div>
								<div class="grid_9">
									<h6 id="headline"><?php echo $rs["MainIdea"]; ?></h6>
									<h5 class="date"><?php echo date("l, F jS, Y",strtotime($rs["IdeaTime"])); ?></h5>
									<p><?php echo $rs["Description"]; ?></p>
									<?php /* <p><?php echo $rs["Description1"]; ?></p>
									<p><?php echo $rs["Description2"]; ?></p>
									<p><?php echo $rs["Description3"]; ?></p> */ ?>
								</div>
<?php
							}
?>
						</section>
		
					</div>
		
				</div><!-- end content-module-main -->
		
			</div><!-- end content-module -->
		
		</div><!-- end content -->
<?php
		include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>