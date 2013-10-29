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
						<h1>ฝากประวัติ <span class="text-blue">- เพิ่มประสบการณ์ทำงาน</span></h1>
					</div>
					<form id="add_education_form" name="add_education_form" action="<?php echo $rootpath; ?>include/module/edit-experience-process.php" method="POST" enctype="multipart/form-data">
<?php
						$sql_experiences="
							SELECT * 
							FROM  `buildthedot_thaijobhd_user_history_experiences`
							WHERE `user_account_id` = '".$_SESSION["userid"]."'
							AND `user_history_experiences_id` = '".$_GET["id"]."' ;
						";
						$result_experiences = @mysql_query($sql_experiences);
						if($rs_experiences = @mysql_fetch_array($result_experiences)){
?>
							<input type="hidden" name="user_history_experiences_id" value="<?php echo $_GET["id"]; ?>" />
							<p class="grid_2">ตำแหน่งงาน</p>
							<p class="grid_8"><input type="text" id="job_position" name ="job_position" value="<?php echo $rs_experiences["job_position"]; ?>" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
							<p class="grid_2">สถานประกอบการ</p>
							<p class="grid_8"><input type="text" id="company_name" name ="company_name" value="<?php echo $rs_experiences["company_name"]; ?>" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
							<p class="grid_2">ปีเริ่ม</p>
							<p class="grid_8"><input type="text" id="year_start" name ="year_start" value="<?php echo $rs_experiences["year_start"]; ?>" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
							<p class="grid_2">ปีจบ</p>
							<p class="grid_8"><input type="text" id="year_end" name ="year_end" value="<?php echo $rs_experiences["year_end"]; ?>" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
							<p class="grid_2">เงินเดือน</p>
							<p class="grid_8"><input type="text" id="salary" name ="salary" value="<?php echo $rs_experiences["salary"]; ?>" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
				      <h2 class="grid_3"><a href="#" class="add-button black round" onclick="document.getElementById('add_education_form').submit(); ">เพิ่ม</a></h2>
<?php
						}
?>
					</form>
				</div>	
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>