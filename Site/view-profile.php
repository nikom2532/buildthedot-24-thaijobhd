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
						<h1>ฝากประวัติ</h1>
					</div>
			
					<h2 id="sub-title">ประวัติส่วนตัว <span class="right"><a href="<?php echo $rootpath; ?>edit-profile.php" class="button round black right">แก้ไข</a></span></h2>
					<h3 class="text-grey"><?php echo $rs_user["firstname"]." ".$rs_user["midname"]." ".$rs_user["lastname"]; ?></h3>
					<div>
						<img src="images/<?php 
							if($rs_user["profile_picture"] != ""){
								echo "user_account/".$rs_user["picture_profile"];
							}
							else{
								echo "banner-2.png";
							}
						?>" width="144" height="143" />
					</div>
					<br class="clear"/>
			
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						ชื่อบิดา
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						ชื่อมารดา
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						บุคคลที่ติดต่อได้
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_3">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2 prefix_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2 prefix_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2 prefix_2">
						Lorem Ipsum
					</p>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<h2 id="sub-title">ประวัติการศึกษา<span class="right"><a href="<?php echo $rootpath; ?>add-education.php" class="button round black right">แก้ไข</a></span></h2>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>

					<div class="prefix_2">
						<div id="head-table1" class="grid_9">
							<p class="grid_2 center">
								ระดับการศึกษา
							</p>
							<p class="grid_3 center">
								สถาบัน
							</p>
							<p class="grid_1 center">
								ปี
							</p>
							<p class="grid_2 center">
								วุฒิการศึกษา
							</p>
						</div>
					</div>
					<br class="clear"/>
<?php
					$sql_edu="
						SELECT *, YEAR(`year_start`) AS year_start_1, YEAR(`year_end`) AS year_end_1
						FROM  `buildthedot_thaijobhd_user_history_educations`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_edu = @mysql_query($sql_edu);
					if(@mysql_num_rows($result_edu)==0){
?>
						<div class="prefix_2">
							<div class="grid_9" id="table-content">
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
							</div>
						</div>
						<br class="clear"/>
<?php
					}
					else{
						while($rs_edu = @mysql_fetch_array($result_edu)){
?>
							<div class="prefix_2">
								<div class="grid_9" id="table-content">
									<p class="grid_2 center">
										<?php echo $rs_edu["education_level"]; ?>
									</p>
									<p class="grid_3 center">
										<?php echo $rs_edu["Institution"]; ?>
									</p>
									<p class="grid_1 center">
										<?php echo $rs_edu["year_start_1"]." - ".$rs_edu["year_end_1"]; ?>
									</p>
									<p class="grid_2 center">
										<?php echo $rs_edu["educational_background"]; ?>
									</p>
								</div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>
					<h2 id="sub-title">การทำงาน<span class="right"><a href="<?php echo $rootpath; ?>add-experience.php" class="button round black right">แก้ไข</a></span></h2>
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<br class="clear"/>
					<div class="prefix_2">
						<div id="head-table1" class="grid_9">
							<p class="grid_2 center">
								ตำแหน่งงาน
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
						</div>
					</div>
					<br class="clear"/>
<?php
					$sql_experiences="
						SELECT *, YEAR(`year_start`) AS year_start_1, YEAR(`year_end`) AS year_end_1
						FROM  `buildthedot_thaijobhd_user_history_experiences`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_experiences = @mysql_query($sql_experiences);
					if(@mysql_num_rows($result_experiences)==0){
?>
						<div class="prefix_2">
							<div class="grid_9" id="table-content">
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
							</div>
						</div>
						<br class="clear"/>
<?php
					}
					else{
						while($rs_experiences = @mysql_fetch_array($result_experiences)){
?>					
							<div class="prefix_2">
								<div class="grid_9" id="table-content">
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
								</div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>
					<h2 id="sub-title">ความสามารถพิเศษ<span class="right"><a href="<?php echo $rootpath; ?>add-talent.php" class="button round black right">แก้ไข</a></span></h2>
					<p class="grid_2">
						ทักษะด้านภาษา
					</p>
					<br class="clear"/>
					<div class="prefix_1">
						<div id="content-profile-table">
							<div id="head-table1" class="grid_11">
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
								
							</div>
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
						<div class="prefix_1">
							<div id="content-profile-table">
								<div id="table-content" class="grid_11">
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
								</div>
							</div>
						</div>
						<br class="clear"/>
<?php
					}
					else{
						while($rs_talent = @mysql_fetch_array($result_talent)){
?>
							<div class="prefix_1">
								<div id="content-profile-table">
									<div id="table-content" class="grid_11">
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
										
									</div>
								</div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>

					<p class="grid_2">
						ความสามารถพิเศษ
					</p>
					<br class="clear"/>
					<div class="prefix_2">
<?php
					$sql_history_talent_others="
						SELECT * 
						FROM  `buildthedot_thaijobhd_user_history_talent_others`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_history_talent_others = @mysql_query($sql_history_talent_others);
					if(@mysql_num_rows($result_history_talent_others)==0){
						echo "-";
					}
					else{
						while ($rs_history_talent_others = @mysql_fetch_array($result_history_talent_others)) {
?>
							<p class="grid_4">
								<?php echo $rs_history_talent_others["topic"]; ?>
							</p>
							<br class="clear"/>
<?php
						}
					}
?>
					</div>
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>