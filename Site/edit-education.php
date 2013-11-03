<?php
@session_start();
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
				<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขประวัติการศึกษา</span></h1>
			</div>
			<form id="add_education_form" name="add_education_form" action="<?php echo $rootpath; ?>include/module/edit-education-process.php" method="POST" enctype="multipart/form-data">
<?php
				$sql_edu="
					SELECT * 
					FROM  `buildthedot_thaijobhd_user_history_educations`
					WHERE `user_account_id` = '".$_SESSION["userid"]."' 
					AND `user_history_educations_id` = '".$_GET["id"]."' ;
					;
				";
				$result_edu = @mysql_query($sql_edu);
				if($rs_edu = @mysql_fetch_array($result_edu)){
?>
					<input type="hidden" name="user_history_educations_id" value="<?php echo $_GET["id"]; ?>" />
					<p class="grid_2">ระดับการศึกษา</p>
					<p class="grid_8"><input type="text" id="education_level" name ="education_level" class="round width700" value="<?php echo $rs_edu["education_level"]; ?>" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
					<p class="grid_2">สถาบัน</p>
					<p class="grid_8"><input type="text" id="Institution" name ="Institution" class="round width700" value="<?php echo $rs_edu["Institution"]; ?>" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
					<p class="grid_2">ปีเริ่ม</p>
					<p class="grid_8"><input type="text" id="year_start" name ="year_start" class="round width700" value="<?php echo $rs_edu["year_start"]; ?>" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
					<p class="grid_2">ปีจบ</p>
					<p class="grid_8"><input type="text" id="year_end" name ="year_end" class="round width700" value="<?php echo $rs_edu["year_end"]; ?>"  onkeypress="return add_education_form_keypress(event)" /></p><br class="clear"/>
					<p class="grid_2">วุฒิการศึกษา</p>
					<p class="grid_8"><input type="text" id="educational_background" name ="educational_background" class="round width700" value="<?php echo $rs_edu["educational_background"]; ?>" onkeypress="return add_education_form_keypress(event)" /></p><br class="clear" />
					<p class="grid_12 center"><a href="#" class="save-button blue round" onclick="document.getElementById('add_education_form').submit(); ">บันทึก</a></p>
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