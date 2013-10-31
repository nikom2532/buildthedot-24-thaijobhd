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
						<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขประวัติส่วนตัว</span></h1>
					</div>
					<form id="edit_profile_form" name="edit_profile_form" action="<?php echo $rootpath; ?>include/module/edit-profile-process.php" method="POST" enctype="multipart/form-data">
						<h2><a href="#" class="button black round">เพิ่มรูป</a></h2>
						<p class="grid_2">
							ขนาด 200*200 px
						</p>
						<br class="clear"/>
						
						<p class="grid_2">
							วันเกิด
						</p>
						<p class="grid_8">
							<input type="text" id="birthdate" name ="birthdate" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						
						<p class="grid_2">
							สถาทที่เกิด
						</p>
						<p class="grid_8">
							<input type="text" id="place_of_birth" name ="place_of_birth" class="round" value="<?php echo $rs_user[""]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							อายุ
						</p>
						<p class="grid_8">
							<input type="text" id="age" name ="age" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							สัญชาติ
						</p>
						<p class="grid_8">
							<input type="text" id="nationality" name ="nationality" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ศาสนา
						</p>
						<p class="grid_8">
							<input type="text" id="religion" name ="religion" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ส่วนสูง
						</p>
						<p class="grid_8">
							<input type="text" id="height" name ="height" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							น้ำหนัก
						</p>
						<p class="grid_8">
							<input type="text" id="weight" name ="weight" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							หมู่เลือด
						</p>
						<p class="grid_8">
							<input type="text" id="blood" name ="blood" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ตำหนิ
						</p>
						<p class="grid_8">
							<input type="text" id="lesion" name ="lesion" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ที่อยู่ปัจจุบัน
						</p>
						<p class="grid_8">
							<input type="text" id="current_address" name ="current_address" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							เบอร์โทรศัพท์
						</p>
						<p class="grid_8">
							<input type="text" id="phone_number" name ="phone_number" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							E-mail
						</p>
						<p class="grid_8">
							<input type="text" id="email" name ="email" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ชื่อคู่สมรส
						</p>
						<p class="grid_8">
							<input type="text" id="pouse_name" name ="pouse_name" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							จำนวนบุตร
						</p>
						<p class="grid_8">
							<input type="text" id="number_of_children" name ="number_of_children" class="round" value="<?php echo $rs_user["birthdate"]; ?>" />
						</p>
						<br class="clear"/>
						<p class="grid_2">
							สถานะทางทหาร
						</p>
	
						
						<p class="grid_4 ">
							<label for="military_status1" class="alt-label">
								<input type="radio" id="military_status1" name="military_status" checked="checked" />
								ผ่านการเกณฑ์ทหาร </label>
							<label for="military_status2" class="alt-label">
								<input type="radio" id="military_status2" name="military_status" />
								ศึกษาวิชาการ </label>
						</p>
						<br class="clear"/>
						<p class="grid_4 prefix_2">
							<label for="military_status3" class="alt-label">
								<input type="radio" id="military_status3" name="military_status" checked="checked" />
								ได้รับการยกเว้น </label>
							<label for="military_status4" class="alt-label">
								<input type="radio" id="military_status4" name="military_status" />
								อื่นๆ </label>
						</p>
						<br class="clear"/>
						<p class="grid_2">
							สถานะที่อยู่
						</p>
						<p class="grid_8">
							<label for="current_address_status1" class="alt-label">
								<input type="radio" id="current_address_status1" name="current_address_status" checked="checked" />
								บ้านส่วนตัว </label>
							<label for="current_address_status2" class="alt-label">
								<input type="radio" id="current_address_status2" name="current_address_status" />
								บ้านเช่า </label>
							<label for="current_address_status3" class="alt-label">
								<input type="radio" id="current_address_status3" name="current_address_status" />
								อาศัยบิดามารดา </label>
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							สถานะ
						</p>
						<p class="grid_8">
							<label for="relationship_status1" class="alt-label">
								<input type="radio" id="relationship_status1" name="relationship_status" checked="checked" />
								โสด </label>
							<label for="relationship_status2" class="alt-label">
								<input type="radio" id="relationship_status2" name="relationship_status" />
								สมรส </label>
							<label for="relationship_status3" class="alt-label">
								<input type="radio" id="relationship_status3" name="relationship_status" />
								หย่า </label>
							<label for="relationship_status4" class="alt-label">
								<input type="radio" id="relationship_status4" name="relationship_status" />
								แยกกันอยู่ </label>
						</p>
						<br class="clear"/>
						<p class="grid_2">
							ชื่อบิดา
						</p>
						<p class="grid_2">
							<input type="text" id="father_name" name ="father_name" class="round" />
						</p>
						<br class="clear"/>
						<p class="grid_2 prefix_2">
							อายุ
							<input type="text" id="father_age" name ="father_age" class="round input-small" />
						</p>
						<p class="grid_2">
							อาชีพ
							<input type="text" id="father_career" name ="father_career" class="round input-small" />
						</p>
						<p class="grid_4">
							<label for="father_live_status1" class="alt-label">
								<input type="radio" id="father_live_status1" name="father_live_status" checked="checked" />
								มีชีวิต </label>
							<label for="father_live_status2" class="alt-label">
								<input type="radio" id="father_live_status2" name="father_live_status" />
								ถึงแก่กรรม </label>
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							ชื่อมารดา
						</p>
						<p class="grid_2">
							<input type="text" id="mother_name" name ="mother_name" class="round" />
						</p>
						<br class="clear"/>
						<p class="grid_2 prefix_2">
							อายุ
							<input type="text" id="mother_age" name ="mother_age" class="round input-small" />
						</p>
						<p class="grid_2">
							อาชีพ
							<input type="text" id="mother_career" name ="mother_career" class="round input-small" />
						</p>
						<p class="grid_4">
							<label for="mother_live_status1" class="alt-label">
								<input type="radio" id="mother_live_status1" name="mother_live_status" checked="checked" />
								มีชีวิต </label>
							<label for="mother_live_status2" class="alt-label">
								<input type="radio" id="mother_live_status2" name="mother_live_status" />
								ถึงแก่กรรม </label>
						</p>
						<br class="clear"/>
			
						<p class="grid_4">
							บุคคลอ้างอิงที่ติดต่อได้
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							ชื่อ
						</p>
						<p class="grid_2">
							<input type="text" id="name" name ="name" class="round" />
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							ความสัมพันธ์
						</p>
						<p class="grid_2">
							<input type="text" id="name" name ="name" class="round" />
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							สถานที่ทำงาน
						</p>
						<p class="grid_2">
							<input type="text" id="name" name ="name" class="round" />
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							ตำแหน่ง
						</p>
						<p class="grid_2">
							<input type="text" id="name" name ="name" class="round" />
						</p>
						<br class="clear"/>
			
						<p class="grid_2">
							เบอร์โทรศัพท์
						</p>
						<p class="grid_2">
							<input type="text" id="name" name ="name" class="round" />
						</p>
						<br class="clear"/>
			
						<p class="grid_12 center">
							<a href="#" class="save-button blue round">บันทึก</a>
						</p>
					</form>
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>