<?php 
session_start();
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
					<h2>โฆษณา<span class="right"><a href="#" class="add-button blue round">เพิ่ม</a></span></h2>
					<table>
						<thead>
							<tr>
								<th width="9%">ลำดับที่</th>
								<th width="43%">ชื่อ Banner</th>
								<th width="23%">ลิ้งค์</th>
								<th width="11%">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tbody>
<?php
								$i=1;
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_ad` ;
								";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $rs["AdPic"]; ?></td>
										<td><a href="<?php echo $rs["AdLink"]; ?>" target="_block"><?php echo $rs["AdLink"]; ?></a></td>
										<td id="action" class="center"><a href="edit-advertisement.php?adid=<?php echo $rs["PictureID"]; ?>" class="table-actions-button text-blue">แก้ไข</a><a href="#" class="table-actions-button text-red">ลบ</a></td>
									</tr>
<?php
								}
?>
							</tbody>
					</table>
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