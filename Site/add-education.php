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
						<h1>ฝากประวัติ <span class="text-blue">-  เพิ่มประวัติการศึกษา</span></h1>
					</div>
					<form id="add_education_form" name="add_education_form" action="<?php echo $rootpath; ?>include/module/add-education-process.php" method="POST" enctype="multipart/form-data">
						<p class="grid_2">ระดับการศึกษา</p>
						<p class="grid_8"><input type="text" id="education_level" name ="education_level" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
						<p class="grid_2">สถาบัน</p>
						<p class="grid_8"><input type="text" id="Institution" name ="Institution" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
						<p class="grid_2">ปีเริ่ม</p>
						<p class="grid_8"><input type="text" id="year_start" name ="year_start" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
						<p class="grid_2">ปีจบ</p>
						<p class="grid_8"><input type="text" id="year_end" name ="year_start" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
						<p class="grid_2">วุฒิการศึกษา</p>
						<p class="grid_8"><input type="text" id="educational_background" name ="educational_background" class="round width700" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
			      <h2 class="grid_3"><a href="#" class="add-button black round" onclick="document.getElementById('add_education_form').submit(); ">เพิ่ม</a></h2>
		      </form>
					<div id="content-profile-table">
						<div id="head-table1" class="grid_10">
							<p class="grid_2 center">ระดับการศึกษา</p>
							<p class="grid_3 center">สถาบัน</p>
							<p class="grid_1 center">ปี</p>
							<p class="grid_2 center">วุฒิการศึกษา</p>
							<p class="grid_2 center"></p>
						</div>
					</div>
					<br class="clear"/>
<?php
					$sql_edu="
						SELECT *, `education_level`, `Institution`, `educational_background`, YEAR(`year_start`) AS year_start_1, YEAR(`year_end`) AS year_end_1
						FROM  `buildthedot_thaijobhd_user_history_educations`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_edu = @mysql_query($sql_edu);
					if(@mysql_num_rows($result_edu)==0){
?>
						<div id="content-profile-table">
							<div id="table-content">
								<p class="grid_2 center">-</p>
								<p class="grid_3 center">-</p>
								<p class="grid_1 center">-</p>
								<p class="grid_2 center">-</p>
			         </div>
						</div>
						<br class="clear"/>
<?php
					}
					else{
						while($rs_edu = @mysql_fetch_array($result_edu)){
?>
							<div id="content-profile-table">
								<div id="table-content">
									<p class="grid_2 center"><?php echo $rs_edu["education_level"]; ?></p>
									<p class="grid_3 center"><?php echo $rs_edu["Institution"]; ?></p>
									<p class="grid_1 center"><?php echo $rs_edu["year_start_1"]." - ".$rs_edu["year_end_1"]; ?></p>
									<p class="grid_2 center"><?php echo $rs_edu["educational_background"]; ?></p>
									<p class="grid_1 center"><a href="<?php echo $rootpath; ?>edit-education.php?id=<?php echo $rs_edu["user_history_educations_id"]; ?>" class="text-blue">แก้ไข</a></p>
									<p class="grid_1 center"><a href="#" onclick="delete_user_history_education('<?php echo $rootpath; ?>', '<?php echo $rs_edu["user_history_educations_id"]; ?>'); " class="text-red">ลบ</a></p>
				         </div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>
					<p class="grid_12 center"><a href="<?php echo $rootpath; ?>view-profile.php" class="save-button blue round">กลับหน้า ฝากประวัติ</a></p>
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>