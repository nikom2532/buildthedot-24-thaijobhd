<?php 
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
//include($rootpath."include/opendb.php");
include($rootadminpath."include/connect-to-database.php");
//$_SESSION["userid"] = "";
if($_SESSION["userid"] == "") {
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
		
		//Find user
		$UserID = $_GET["userID"];
		$sql_user="
			SELECT * 
			FROM  `buildthedot_thaijobhd_user_account`
			WHERE `id` = '".$UserID."' ;
		";
		$result_user = @mysql_query($sql_user);
		if($result_user){
			if($rs_user = @mysql_fetch_array($result_user)){
?>
				<!-- MAIN CONTENT -->
				<div id="content">
					<div class="content-module">
						<div id="content-profile">
							<div id="head-title">
								<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขภาษาและความสามารถพิเศษ</span></h1>
							</div>
							<p>
								ทักษะด้านภาษา
							</p>
							<form id="edit_talent_form" name="edit_talent_form" action="<?php echo $rootadminpath; ?>include/module/add-talent-language-process.php" method="POST" enctype="multipart/form-data">
								<h4 class="">เลือกภาษา
									<select class="" name="language">
		<?php
										include($rootpath."include/initial/edit-talent-language-php.php");
										for ($i=0; $i < count($language); $i++) {
		?>
										  <option value="<?php echo $language[$i]; ?>"><?php echo $language[$i]; ?></option>
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
											<label for="score_speaking1" class="alt-label">
												<input type="radio" id="score_speaking1" name="score_speaking" value="3" checked="checked" />
												ดีมาก </label>
											<label for="score_speaking2" class="alt-label">
												<input type="radio" id="score_speaking2" name="score_speaking" value="2" />
												ดี </label>
											<label for="score_speaking3" class="alt-label">
												<input type="radio" id="score_speaking3" name="score_speaking" value="1" />
												พอใช้ </label>
										</section>
										<section class="grid_3 center">
											<label for="score_understanding1" class="alt-label">
												<input type="radio" id="score_understanding1" name="score_understanding" value="3" checked="checked" />
												ดีมาก </label>
											<label for="score_understanding2" class="alt-label">
												<input type="radio" id="score_understanding2" name="score_understanding" value="2" />
												ดี </label>
											<label for="score_understanding3" class="alt-label">
												<input type="radio" id="score_understanding3" name="score_understanding" value="1" />
												พอใช้ </label>
										</section>
										<section class="grid_3 center">
											<label for="score_reading1" class="alt-label">
												<input type="radio" id="score_reading1" name="score_reading" checked="checked" value="3" />
												ดีมาก </label>
											<label for="score_reading2" class="alt-label">
												<input type="radio" id="score_reading2" name="score_reading" value="2" />
												ดี </label>
											<label for="score_reading3" class="alt-label">
												<input type="radio" id="score_reading3" name="score_reading" value="1" />
												พอใช้ </label>
										</section>
										<p class="grid_3 center">
											<label for="score_writing1" class="alt-label">
												<input type="radio" id="score_writing1" name="score_writing" value="3" checked="checked" />
												ดีมาก </label>
											<label for="score_writing2" class="alt-label">
												<input type="radio" id="score_writing2" name="score_writing" value="2" />
												ดี </label>
											<label for="score_writing3" class="alt-label">
												<input type="radio" id="score_writing3" name="score_writing" value="1" />
												พอใช้ </label>
											</section>
									</div>
								</div>
								<br class="clear"/>
								
								<h2 class="grid_3"><a href="#" class="add-button black round" onclick="document.getElementById('edit_talent_form').submit(); ">เพิ่ม</a></h2>
								
								<br class="clear"/>
							</form>
							<div id="content-profile-table">
								<div id="head-table1" class="grid_12">
									<p class="grid_2 center">
										ภาษา
									</p>
									<p class="grid_2 center">
										การพูด
									</p>
									<p class="grid_2 center">
										ความเข้าใจ
									</p>
									<p class="grid_2 center">
										การอ่าน
									</p>
									<p class="grid_2 center">
										การเขียน
									</p>
									<p class="grid_1 center"></p>
								</div>
							</div>
							<br class="clear"/>
		<?php
							$sql_talent="
								SELECT * 
								FROM  `buildthedot_thaijobhd_user_history_talent_languages`
								WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
							";
							$result_talent = @mysql_query($sql_talent);
							if(@mysql_num_rows($result_talent)==0){
		?>
								<div id="content-profile-table">
									<div id="table-content">
										<p class="grid_2 center">
											-
										</p>
										<p class="grid_2 center">
											-
										</p>
										<p class="grid_2 center">
											-
										</p>
										<p class="grid_2 center">
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
								while($rs_talent = @mysql_fetch_array($result_talent)){
		?>
									<div id="content-profile-table">
										<div id="table-content">
											<p class="grid_2 center">
												<?php echo $rs_talent["language"]; ?>
											</p>
											<p class="grid_2 center">
		<?php
												if($rs_talent["score_speaking"]=="3"){
													echo "ดีมาก";
												}
												elseif($rs_talent["score_speaking"]=="2"){
													echo "ดี";
												}
												elseif($rs_talent["score_speaking"]=="1"){
													echo "พอใช้";
												}
		?>
											</p>
											<p class="grid_2 center">
		<?php
												if($rs_talent["score_understanding"]=="3"){
													echo "ดีมาก";
												}
												elseif($rs_talent["score_understanding"]=="2"){
													echo "ดี";
												}
												elseif($rs_talent["score_understanding"]=="1"){
													echo "พอใช้";
												}
		?>
											</p>
											<p class="grid_2 center">
		<?php
												if($rs_talent["score_reading"]=="3"){
													echo "ดีมาก";
												}
												elseif($rs_talent["score_reading"]=="2"){
													echo "ดี";
												}
												elseif($rs_talent["score_reading"]=="1"){
													echo "พอใช้";
												}
		?>
											</p>
											<p class="grid_2 center">
		<?php
												if($rs_talent["score_writing"]=="3"){
													echo "ดีมาก";
												}
												elseif($rs_talent["score_writing"]=="2"){
													echo "ดี";
												}
												elseif($rs_talent["score_writing"]=="1"){
													echo "พอใช้";
												}
		?>
											</p>
											<p class="grid_1 center"><a href="<?php echo $rootpath; ?>edit-talent.php?id=<?php echo $rs_talent["user_history_talent_languages_id"]; ?>" class="text-blue">แก้ไข</a></p>
											<p class="grid_1 center"><a onclick="delete_user_history_talent_languages('<?php echo $rootpath; ?>', '<?php echo $rs_talent["user_history_talent_languages_id"]; ?>'); " href="#" class="text-red">ลบ</a></p>
										</div>
									</div>
									<br class="clear"/>
		<?php
								}
							}
		?>
							<br class="clear"/>
							<div class="grid_4 space-top">
								ความสามารถพิเศษ
							</div>
		
							<div class="grid_8 space-top">
								<p class="grid_12">
		<?php
									$sql_talent_special="
										SELECT * 
										FROM  `buildthedot_thaijobhd_user_history_talent_others`
										WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
									";
									$result_talent_special = @mysql_query($sql_talent_special);
									if($rs_talent_special = @mysql_fetch_array($result_talent_special)){
										echo $rs_talent_special["topic"]; 
									}
		?>
								</p>				
							</div>
							<br class="clear"/>
							<span class="right">
								<a href="<?php echo $rootpath; ?>edit-talent-special.php" class="save-button black round right">แก้ไขความสามารถพิเศษ</a>
							</span>
				
							<p class="grid_12 center">
								<a href="<?php echo $rootpath; ?>view-profile.php" class="save-button blue round">กลับหน้า ฝากประวัติ</a>
							</p>
				
						</div>
					</div> <!-- end content-module -->
				</div> <!-- end content -->
<?php

			}
		}
		include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>