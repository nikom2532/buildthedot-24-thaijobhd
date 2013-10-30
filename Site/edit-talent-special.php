<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
include ($rootpath . "include/search-bar.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootpath."login.php");
}
else{
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
					<form id="edit_talent_form" name="edit_talent_form" action="<?php echo $rootpath; ?>include/module/add-talent-others-process.php" method="POST" enctype="multipart/form-data">
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
										echo $result_talent["topic"]; 
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
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>