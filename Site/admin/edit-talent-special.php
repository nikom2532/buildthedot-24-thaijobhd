<?php
@session_start();
$rootpath="../";
$rootadminpath="./";
include ($rootadminpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
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
		
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `id` = '".$_SESSION["userid"]."' ;
	";
	$result_user = @mysql_query($sql_user);
	if($rs_user = @mysql_fetch_array($result_user)){
?>
		<div id="wrapper">
			<div id="content" class="container_12">
				<div id="content-profile">
					<div id="head-title">
						<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขความสามารถพิเศษ</span></h1>
					</div>
					<br class="clear"/>
					
					<br class="clear"/>
					<p class="grid_12 space-top">
						ความสามารถพิเศษ
					</p>
					<br class="clear"/>
					<form id="edit_talent_form" name="edit_talent_form" action="<?php echo $rootadminpath; ?>include/module/add-talent-others-process.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="userID" value="<?php echo $_GET["userID"]; ?>" />
<?php
						$sql_talent="
							SELECT * 
							FROM  `buildthedot_thaijobhd_user_history_talent_others`
							WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
						";
						$result_talent = @mysql_query($sql_talent);
?>		
						<div class="prefix_2">
							<p class="grid_12">
								<textarea id="topic" name="topic" class="round"><?php 
									if($rs_talent = @mysql_fetch_array($result_talent)){
										echo $rs_talent["topic"]; 
									}
								?></textarea>
							</p>				
							<br class="clear"/>
						</div>
						
						<p class="grid_12 center">
							<a href="#" class="save-button blue round" onclick="document.getElementById('edit_talent_form').submit(); ">บันทึก</a>
						</p>
					</form>
				</div>
			</div><!--end content -->
<?php
		}
		include ("include/footer.php");
	} //end sql_user
}//end check user session
?>