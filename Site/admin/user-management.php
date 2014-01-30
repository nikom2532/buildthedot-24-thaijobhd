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
		
		$menu="user-management";
		include($rootadminpath."include/top-menu.php");
?>
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
								$i=1;
								if($_GET["page"] ==""){
									$_GET["page"] = 1;
								}
								// $sql="
									// SELECT * 
									// FROM  `buildthedot_thaijobhd_job_idea`
									// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
								// ";
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_job_idea`
								";
								$result=@mysql_query($sql);
								$number_of_items=@mysql_num_rows($result);
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_job_idea` 
								 	LIMIT {$start} , {$page_limit} ;
								";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<tr>
										<td><?php //echo $rs["CompanyID"]; ?><?php echo $i++; ?></td>
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
											<!-- <a href="<?php echo $rootadminpath; ?>include/module/delete-recommend-idea-process.php?CompanyID=<?php echo $rs["CompanyID"]; ?>" class="table-actions-button text-red">ลบ</a> -->
											<a href="#" onclick="delete_recommend_idea('<?php echo $rootadminpath; ?>' , '<?php echo $rs["CompanyID"]; ?>');" class="table-actions-button text-red">ลบ</a>
										</td>
									</tr>
<?php
								}
?>
							</tbody>
						</table>
<?php
						//############ Paging ############
						echo pagination($page_limit, $page, $rootadminpath."business-idea.php?page=", $number_of_items); //call function to show pagination
						
							/*
							$sql="
								SELECT * 
								FROM  `buildthedot_thaijobhd_job_idea`
								LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
							";
							$result = @mysql_query($sql);
							$number_of_items = @mysql_num_rows($result);
							$number_of_pages = ((int)(($number_of_items-1)/$page_limit))+1;
?>
								<ul class="pagination">
									<li class="details">Page <?php echo $page; ?> of <?php echo $number_of_pages; ?></li>
	<?php
									for($i=1;$i<=$number_of_pages;$i++){	//Page Button
	?>
										<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo $i; ?>" <?php if($page==$i){ ?>class="current" <?php } ?>><?php echo $i; ?></a></li>
	<?php
									}
									if($_GET["page"]<$number_of_pages){	//Next Button
	?>
										<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo ($_GET["page"]+1); ?>">Next</a></li>
	<?php
									}
	?>
								</ul>
<?php
							//########## End Paging ##########
							*/
?>
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
		</div> <!-- end content -->
<?php
	include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>