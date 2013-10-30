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
						<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขภาษาและความสามารถพิเศษ</span></h1>
					</div>
					<p>
						ทักษะด้านภาษา
					</p>
					<form id="edit_talent_form" name="edit_talent_form" action="<?php echo $rootpath; ?>include/module/...-process.php" method="POST" enctype="multipart/form-data">
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
						
						<h2 class="grid_3"><a href="#" class="add-button black round" onclick="document.getElementById('edit_talent_form').submit(); ">เพิ่ม</a></h2>
						
						<br class="clear"/>
					</form>
					
					
					<div id="content-profile-table">
						<div id="head-table1" class="grid_10">
							<p class="grid_2 center">
								การพูด
							</p>
							<p class="grid_3 center">
								ความเข้าใจ
							</p>
							<p class="grid_1 center">
								การอ่าน
							</p>
							<p class="grid_2 center">
								การเขียน
							</p>
							<p class="grid_2 center"></p>
						</div>
					</div>
					<br class="clear"/>
					
<?php
						$sql_edu="
							SELECT *, YEAR(`year_start`) AS year_start_1, YEAR(`year_end`) AS year_end_1
							FROM  `buildthedot_thaijobhd_user_history_experiences`
							WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
						";
						$result_edu = @mysql_query($sql_edu);
						if(@mysql_num_rows($result_edu)==0){
?>
							<div id="content-profile-table">
								<div id="table-content">
									<p class="grid_2 center">
										-
									</p>
									<p class="grid_3 center">
										-
									</p>
									<p class="grid_1 center">
										-
									</p>
									<p class="grid_2 center">
										-
									</p>
									<p class="grid_2 center">
										
									</p>
								</div>
							</div>
							<br class="clear"/>
<?php
						}
						else{
							while($rs_experiences = @mysql_fetch_array($result_edu)){
?>
								<div id="content-profile-table">
									<div id="table-content">
										<p class="grid_2 center">
											<?php echo $rs_experiences["job_position"]; ?>
										</p>
										<p class="grid_3 center">
											<?php echo $rs_experiences["company_name"]; ?>
										</p>
										<p class="grid_1 center">
											<?php echo $rs_experiences["year_start_1"]." - ".$rs_experiences["year_end_1"]; ?>
										</p>
										<p class="grid_2 center">
											<?php echo $rs_experiences["salary"]; ?>
										</p>
									<p class="grid_1 center"><a href="<?php echo $rootpath; ?>edit-experience.php?id=<?php echo $rs_experiences["user_history_experiences_id"]; ?>" class="text-blue">แก้ไข</a></p>
									<p class="grid_1 center"><a href="#" class="text-red">ลบ</a></p>
									</div>
								</div>
								<br class="clear"/>
<?php
							}
						}
?>
					<p class="grid_12 center">
						<a href="<?php echo $rootpath; ?>view-profile.php" class="save-button blue round">กลับหน้า ฝากประวัติ</a>
					</p>
					
					
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