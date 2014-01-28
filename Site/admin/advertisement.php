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
		
		$menu="advertisement";
		include($rootadminpath."include/top-menu.php");
?>
		<!-- MAIN CONTENT -->
		<div id="content">
			<div class="content-module">
				<div class="content-module-main">
					<h2>โฆษณา<span class="right"><a href="<?php echo $rootadminpath; ?>add-advertisement.php" class="add-button blue round">เพิ่ม</a></span></h2>
					<table>
						<thead>
							<tr>
								<th width="9%">ลำดับที่</th>
								<th width="33%">ชื่อ Banner</th>
								<th width="10%">Type</th>
								<th width="8%">Position</th>
								<th width="18%">ลิ้งค์</th>
								<th width="8%">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tbody>
<?php
								$i=1;
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_ad`
								";
								$result=@mysql_query($sql);
								$number_of_items=@mysql_num_rows($result);
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_ad` 
								 	LIMIT {$start} , {$page_limit} ;
								";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><a href="<?php echo $rootpath; ?>images/ad/<?php echo $rs["AdPic"]; ?>" target="_blank"><?php echo $rs["AdPic"]; ?></a></td>
										<td><?php echo $rs["AdType"]; ?></td>
										<td><?php echo $rs["AdPosition"]; ?></td>
										<td><a href="<?php echo $rs["AdLink"]; ?>" target="_block"><?php echo $rs["AdLink"]; ?></a></td>
										<td id="action" class="center"><a href="edit-advertisement.php?adid=<?php echo $rs["PictureID"]; ?>" class="table-actions-button text-blue">แก้ไข</a><a href="#" class="table-actions-button text-red" onclick="delete_advertisement('<?php echo $rootadminpath; ?>', '<?php echo $rs["PictureID"]; ?>')">ลบ</a></td>
									</tr>
<?php
								}
?>
							</tbody>
					</table>
<?php
						//############ Paging ############
						echo pagination($page_limit, $page, $rootadminpath."advertisement.php?page=", $number_of_items); //call function to show pagination
?>
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