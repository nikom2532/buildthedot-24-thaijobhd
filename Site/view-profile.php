<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
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
			
					<h2 id="sub-title">ประวติการศึกษา<span class="right"><a href="<?php echo $rootpath; ?>edit-education.php" class="button round black right">แก้ไข</a></span></h2>
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
						SELECT * 
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
										<?php echo $rs_edu["year_start"]."-".$rs_edu["year_end"]; ?>
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
					<h2 id="sub-title">การทำงาน<span class="right"><a href="#" class="button round black right">แก้ไข</a></span></h2>
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
					$sql_works="
						SELECT * 
						FROM  `buildthedot_thaijobhd_user_history_works`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_works = @mysql_query($sql_works);
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
						while($rs_works = @mysql_fetch_array($result_works)){
?>					
							<div class="prefix_2">
								<div class="grid_9" id="table-content">
									<p class="grid_2 center">
										<?php echo $rs_works["job_position"]; ?>
									</p>
									<p class="grid_3 center">
										<?php echo $rs_works["company_name"]; ?>
									</p>
									<p class="grid_1 center">
										<?php echo $rs_works["year_start"]."-".$rs_works["year_end"]; ?>
									</p>
									<p class="grid_2 center">
										<?php echo $rs_works["salary"]; ?>
									</p>
								</div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>
					<h2 id="sub-title">ความสามารถพิเศษ<span class="right"><a href="#" class="button round black right">แก้ไข</a></span></h2>
					<p class="grid_2">
						ทักษะด้านภาษา
					</p>
					<br class="clear"/>
					<div class="prefix_2">
						<div id="head-table1" class="grid_9">
							<p class="grid_2 center">
								Language
							</p>
							<p class="grid_1 center">
								Starter
							</p>
							<p class="grid_1 center">
								little
							</p>
							<p class="grid_1 center">
								Mediam
							</p>
							<p class="grid_1 center">
								Good
							</p>
							<p class="grid_1 center">
								Better
							</p>
							<p class="grid_1 center">
								Best
							</p>
						</div>
					</div>
					<br class="clear"/>
<?php
					$sql_history_talent_language="
						SELECT * 
						FROM  `buildthedot_thaijobhd_user_history_talent_language`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_history_talent_language = @mysql_query($sql_history_talent_language);
					if(@mysql_num_rows($result_history_talent_language)==0){
?>
						<div class="prefix_2">
							<div class="grid_9" id="table-content">
								<p class="grid_2 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
								<p class="grid_1 center">
									-
								</p>
							</div>
						</div>
						<br class="clear"/> 
<?php
					}
					else{
						while ($rs_history_talent_language = @mysql_fetch_array($result_history_talent_language)) {
?>
							<div class="prefix_2">
								<div class="grid_9" id="table-content">
									<p class="grid_2 center">
										<?php echo $rs_history_talent_language["language"]; ?>
									</p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 1){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 2){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 3){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 4){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 5){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
									<p class="grid_1 center"><?php
										if($rs_history_talent_language["score"] == 6){
											?><img src="images/green-tick-arrow.png" width="20" /><?php
										}
										else{
											echo "-";
										}
									?></p>
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