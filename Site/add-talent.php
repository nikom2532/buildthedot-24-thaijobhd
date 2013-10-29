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
					<h4 class="text-blue">ไทย</h4>
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
		
					<h4 class="text-blue">ญี่ปุ่น</h4>
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
							<p class="grid_3 center ">
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test" name="test" />
									พอใช้ </label>
							</p>
							<p class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test1" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test1" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test1" name="test" />
									พอใช้ </label>
							</p>
							<p class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test3" name="test" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test3" name="test" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test3" name="test" />
									พอใช้ </label>
							</p>
							<p class="grid_3 center">
								<label for="" class="alt-label">
									<input type="radio" id="test4" name="test4" checked="checked" />
									ดีมาก </label>
								<label for="" class="alt-label">
									<input type="radio" id="test4" name="test4" />
									ดี </label>
								<label for="" class="alt-label">
									<input type="radio" id="test4" name="test4" />
									พอใช้ </label>
							</p>
						</div>
					</div>
					
					<br class="clear"/>
					<span class=""><a href="./add-education.php" class="button round black ">แก้ไข</a></span>
					
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