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
		
					<h2><a href="#" class="button black round">เพิ่มรูป</a></h2>
					<p class="grid_2">
						ขนาด 200*200 px
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						วันเกิด
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					
					<p class="grid_2">
						สถาทที่เกิด
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						อายุ
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สัญชาติ
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ศาสนา
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ส่วนสูง
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						น้ำหนัก
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						หมู่เลือด
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ตำหนิ
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ที่อยู่ปัจจุบัน
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						เบอร์โทรศัพท์
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						E-mail
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สถานะ
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ชื่อคู่สมรส
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						จำนวนบุตร
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สถานะทางทหาร
					</p>

					
					<p class="grid_4 ">
						<label for="" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							ผ่านการเกณฑ์ทหาร </label>
						<label for="" class="alt-label">
							<input type="radio" id="test" name="test" />
							ศึกษาวิชาการ </label>
					</p>
					<br class="clear"/>
					<p class="grid_4 prefix_2">
						<label for="" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							ได้รับการยกเว้น </label>
						<label for="" class="alt-label">
							<input type="radio" id="test" name="test" />
							อื่นๆ </label>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สถานะที่อยู่
					</p>
					<p class="grid_8">
						<label for="selected-radio" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							บ้านส่วนตัว </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							บ้านเช่า </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							อาศัยบิดามารดา </label>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						สถานะ
					</p>
					<p class="grid_8">
						<label for="selected-radio" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							โสด </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							สมรส </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							หย่า </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							แยกกันอยู่ </label>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ชื่อบิดา
					</p>
					<p class="grid_2">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2 prefix_2">
						อายุ
						<input type="text" id="name" name ="name" class="round input-small" />
					</p>
					<p class="grid_2">
						อาชีพ
						<input type="text" id="name" name ="name" class="round input-small" />
					</p>
					<p class="grid_4">
						<label for="selected-radio" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							มีชีวิต </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
							ถึงแก่กรรม </label>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ชื่อมารดา
					</p>
					<p class="grid_2">
						<input type="text" id="name" name ="name" class="round" />
					</p>
					<br class="clear"/>
					<p class="grid_2 prefix_2">
						อายุ
						<input type="text" id="name" name ="name" class="round input-small" />
					</p>
					<p class="grid_2">
						อาชีพ
						<input type="text" id="name" name ="name" class="round input-small" />
					</p>
					<p class="grid_4">
						<label for="selected-radio" class="alt-label">
							<input type="radio" id="test" name="test" checked="checked" />
							มีชีวิต </label>
						<label for="unselected-radio" class="alt-label">
							<input type="radio" id="test" name="test" />
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
		
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>