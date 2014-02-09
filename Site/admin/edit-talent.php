<?php
@session_start();
$rootpath="../";
$rootadminpath="./";
include($rootadminpath."include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
if($_SESSION["userid"] == "" || (!(isset($_SESSION["userid"])))) {
	header("location: ".$rootadminpath."login.php");
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
					
					<form id="edit_talent_form" name="edit_talent_form" action="<?php echo $rootpath; ?>include/module/edit-talent-language-process.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
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
<?php
						$sql_talent="
							SELECT * 
							FROM  `buildthedot_thaijobhd_user_history_talent_languages`
							WHERE `user_account_id` = '".$_SESSION["userid"]."'
							AND `user_history_talent_languages_id` = '".$_GET["id"]."' ;
						";
						$result_talent = @mysql_query($sql_talent);
						while($rs_talent = @mysql_fetch_array($result_talent)){
?>
							<div id="content-profile-table">
								<div id="table-content">
									<section class="grid_3 center">
										<label for="score_speaking1" class="alt-label">
											<input type="radio" id="score_speaking1" name="score_speaking" value="3"<?php
												if($rs_talent["score_speaking"]=="3")	echo "checked=\"checked\"";
											?> />
											ดีมาก </label>
										<label for="score_speaking2" class="alt-label">
											<input type="radio" id="score_speaking2" name="score_speaking" value="2"<?php
												if($rs_talent["score_speaking"]=="2")	echo "checked=\"checked\"";
											?> />
											ดี </label>
										<label for="score_speaking3" class="alt-label">
											<input type="radio" id="score_speaking3" name="score_speaking" value="1"<?php
												if($rs_talent["score_speaking"]=="1")	echo "checked=\"checked\"";
											?> />
											พอใช้ </label>
									</section>
									<section class="grid_3 center">
										<label for="score_understanding1" class="alt-label">
											<input type="radio" id="score_understanding1" name="score_understanding" value="3"<?php
												if($rs_talent["score_understanding"]=="3")	echo "checked=\"checked\"";
											?> />
											ดีมาก </label>
										<label for="score_understanding2" class="alt-label">
											<input type="radio" id="score_understanding2" name="score_understanding" value="2"<?php
												if($rs_talent["score_understanding"]=="2")	echo "checked=\"checked\"";
											?> />
											ดี </label>
										<label for="score_understanding3" class="alt-label">
											<input type="radio" id="score_understanding3" name="score_understanding" value="1" <?php
												if($rs_talent["score_understanding"]=="1")	echo "checked=\"checked\"";
											?>/>
											พอใช้ </label>
									</section>
									<section class="grid_3 center">
										<label for="score_reading1" class="alt-label">
											<input type="radio" id="score_reading1" name="score_reading"<?php
												if($rs_talent["score_reading"]=="3")	echo "checked=\"checked\"";
											?> value="3" />
											ดีมาก </label>
										<label for="score_reading2" class="alt-label">
											<input type="radio" id="score_reading2" name="score_reading" value="2"<?php
												if($rs_talent["score_reading"]=="2")	echo "checked=\"checked\"";
											?> />
											ดี </label>
										<label for="score_reading3" class="alt-label">
											<input type="radio" id="score_reading3" name="score_reading" value="1"<?php
												if($rs_talent["score_reading"]=="1")	echo "checked=\"checked\"";
											?> />
											พอใช้ </label>
									</section>
									<p class="grid_3 center">
										<label for="score_writing1" class="alt-label">
											<input type="radio" id="score_writing1" name="score_writing" value="3"<?php
												if($rs_talent["score_writing"]=="3")	echo "checked=\"checked\"";
											?> />
											ดีมาก </label>
										<label for="score_writing2" class="alt-label">
											<input type="radio" id="score_writing2" name="score_writing" value="2"<?php
												if($rs_talent["score_writing"]=="2")	echo "checked=\"checked\"";
											?> />
											ดี </label>
										<label for="score_writing3" class="alt-label">
											<input type="radio" id="score_writing3" name="score_writing" value="1"<?php
												if($rs_talent["score_writing"]=="1")	echo "checked=\"checked\"";
											?> />
											พอใช้ </label>
										</section>
								</div>
							</div>
							<br class="clear"/>
<?php
						}
?>
						<h2 class="grid_12 center"><a href="#" class="add-button blue round" onclick="document.getElementById('edit_talent_form').submit(); ">บันทึก</a></h2>
					</form>
					<br class="clear"/>
				</div>
			</div><!--end content -->
<?php
		}
		include ("include/footer.php");
	} //end sql_user
}//end check user session
?>