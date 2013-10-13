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
				<h2>บริษัทชั้นนำ<span class="right"><a href="<?php echo $rootadminpath; ?>add-company.php" class="add-button blue round">เพิ่ม</a></span></h2>
				<table>
					<thead>
						<tr>
							<th width="9%">ลำดับที่</th>
							<th width="23%">ชื่อบริษัท</th>
							<th width="20%">Path รูป</th>
							<th width="23%">ลิงค์</th>
							<th width="14%">สถานะ</th>
							<th width="11%">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tbody>
<?php
							$i=1;
							$sql="
								SELECT * 
								FROM  `buildthedot_thaijobhd_top_company` ;
							";
							$result=@mysql_query($sql);
							while($rs=@mysql_fetch_array($result)){
?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $rs["TopCompanyName"]; ?></td>
									<td><a href="<?php echo $rootpath; ?>images/top_company/<?php echo $rs["CompanyPic"]; ?>" target="_blank"><?php echo $rs["CompanyPic"]; ?></a></td>
									<td><a href="#"><?php echo $rs["LinkAddress"]; ?></a></td>
									<td id="status"><img src="images/icons/message-boxes/<?php 
										if($rs["Status"]==1){
											echo "confirmation.png";
										}
										elseif($rs["Status"]==0){
											echo "error.png";
										}
									?>" alt="active"></td>
									<td id="action" class="center"><a href="<?php echo $rootadminpath; ?>edit-company.php?company_id=<?php echo $rs["TopCompanyID"]; ?>" class="table-actions-button text-blue">แก้ไข</a><a href="#" class="table-actions-button text-red">ลบ</a></td>
								</tr>
<?php
							}
?>
						</tbody>
					</tfoot>
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