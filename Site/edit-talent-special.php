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
					<p>
						ทักษะด้านภาษา
					</p>
					<h4 class="text-blue">เลือกภาษา
						<select class="text-blue" name="language">
<?php
							include($rootpath."include/initial/edit-talent-language-php.php");
							for ($i=0; $i < count($language); $i++) { 
?>
								  <option value="volvo"><?php echo $language[$i]; ?></option>
<?php
							}
?>
						</select>
					</h4>
					<div id="content-profile-table">
						<div id="head-table">
							<p class="grid_3 center">
								การพูด
							</p>
							<p class="grid_3 center">
								ความเข้าใจ
							</p>
							<p class="grid_3 center">
								การอ่าน
							</p>
							<p class="grid_3 center">
								การเขียน
							</p>
						</div>
					</div>
					<br class="clear"/>
					<div id="content-profile-table">
						<div id="table-content">
							<section class="grid_3 center">
								<label for="read" class="alt-label">
									<input type="radio" id="test" name="test" checked="checked" />
									ดีมาก </label>
								<label for="read" class="alt-label">
									<input type="radio" id="test" name="test" />
									ดี </label>
								<label for="read" class="alt-label">
									<input type="radio" id="test" name="test" />
									พอใช้ </label>
							</section>
							<section class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									พอใช้ </label>
							</section>
							<section class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									พอใช้ </label>
							</section>
							<p class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									พอใช้ </label>
								</section>
						</div>
					</div>
					<br class="clear"/>
					
					<h2 class="grid_3"><a href="#" class="add-button black round" onclick="document.getElementById('add_education_form').submit(); ">เพิ่ม</a></h2>
					
					<div id="content-profile-table">
						<div id="head-table1" class="grid_10">
							<p class="grid_2 center">
								ตำแหน่ง
							</p>
							<p class="grid_3 center">
								สถานประกอบการ
							</p>
							<p class="grid_1 center">
								ปี
							</p>
							<p class="grid_2 center">
								เงินเดือน
							</p>
							<p class="grid_2 center"></p>
						</div>
					</div>
					
					<br class="clear"/>
					<p class="grid_12 space-top">
						ความสามารถพิเศษ
					</p>
					<br class="clear"/>
					<div class="prefix_2">
						<p class="grid_12">
							<textarea id="textarea" class="round"></textarea>
						</p>				
						<br class="clear"/>
					</div>
		
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