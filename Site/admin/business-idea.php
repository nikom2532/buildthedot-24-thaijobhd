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
					
						<h2>ไอเดียธุรกิจ<span class="right"><a href="add-recommend-idea.php" class="add-button blue round">เพิ่ม</a></span></h2>
						
						<table>
						
							<thead>
						
								<tr>
									<th width="8%">ลำดับที่</th>
									<th width="65%">ชื่อเรื่อง</th>
									<th width="12%">ไอเดียแนะนำ</th>
									<th width="15%">Action</th>
								</tr>
							
							</thead>
	
							<tfoot>
							<tbody>
<?php
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_job_idea` ;
								";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<tr>
										<td><?php echo $rs["CompanyID"]; ?></td>
										<td>
											<a href="business-idea-detail.php?CompanyID=<?php echo $rs["CompanyID"]; ?>" class="text-black"><?php echo $rs["MainIdea"]; ?></a>
										</td>
										<td id="status">
											<img src="images/icons/message-boxes/<?php 
												if($rs["IdeaRecomment"]==1) {
													echo "confirmation.png";
												}
												elseif($rs["IdeaRecomment"]==0){
													echo "error.png";
												}
											?>" alt="active" />
										</td>
										<td id="action" class="center">
											<a href="edit-recommend-idea.php?CompanyID=<?php echo $rs["CompanyID"]; ?>" class="table-actions-button text-blue">แก้ไข</a>
											<a href="#" class="table-actions-button text-red">ลบ</a>
										</td>
									</tr>
<?php
								}
?>
							</tbody>
						</table>
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
		</div> <!-- end content -->
<?php
	include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>