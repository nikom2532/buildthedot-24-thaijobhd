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
					
						<h2>ข้อมูลผู้ใช้<span class="right"><a href="add-recommend-idea.php" class="add-button blue round">เพิ่ม</a></span></h2>
						
						<table>
						
							<thead>
						
								<tr>
									<th width="8%">ลำดับที่</th>
									<th width="40%">E-mail</th>
									<th width="40%">Name</th>
									<th width="12%">Admin Status</th>
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
									FROM  `buildthedot_thaijobhd_user_account`
								";
								$result=@mysql_query($sql);
								$number_of_items=@mysql_num_rows($result);
								$sql="
									SELECT * 
									FROM  `buildthedot_thaijobhd_user_account` 
								 	LIMIT {$start} , {$page_limit} ;
								";
								$result=@mysql_query($sql);
								while($rs=@mysql_fetch_array($result)){
?>
									<tr>
										<td><?php //echo $rs["CompanyID"]; ?><?php echo $i++; ?></td>
										<td>
											<a href="view-profile.php?userID=<?php echo $rs["id"]; ?>" class="text-black"><?php echo $rs["email"]; ?></a>
										</td>
										<td>
											<a href="view-profile.php?userID=<?php echo $rs["id"]; ?>" class="text-black"><?php echo $rs["firstname"]." ".$rs["midname"]." ".$rs["lastname"]; ?></a>
										</td>
										<td id="status">
											<img src="images/icons/message-boxes/<?php 
												if($rs["admin_status"]==1) {
													echo "confirmation.png";
												}
												elseif($rs["admin_status"]==0){
													echo "error.png";
												}
											?>" alt="active" />
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