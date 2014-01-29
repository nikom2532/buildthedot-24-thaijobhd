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
		
		$menu="user";
		include($rootadminpath."include/top-menu.php");
?>
		<!-- MAIN CONTENT -->
		<div id="content">
				<div class="content-module">
					
					<div class="content-module-main">
					
						<h2>ไอเดียธุรกิจ<span class="right"><a href="add-recommend-idea.php" class="add-button blue round">เพิ่ม</a></span></h2>
						
						
						<div id="head-title">
						<h1>ฝากประวัติ</h1>
					</div>
			
					<h2 id="sub-title">ประวัติส่วนตัว <span class="right"><a href="<?php echo $rootpath; ?>edit-profile.php" class="button round black right">แก้ไข</a></span></h2>
					<h3 class="text-grey"><?php echo $rs_user["firstname"]." ".$rs_user["midname"]." ".$rs_user["lastname"]." ".$rs_user["nickname"]; ?></h3>
					<div>
						<img src="images/<?php 
							if($rs_user["profile_picture"] != ""){
								echo "user_account/".$rs_user["profile_picture"];
							}
							else{
								echo "banner-2.png";
							}
						?>" width="144" height="143" />
					</div>
					<br class="clear"/>
					
					<p class="grid_2">
						วันเกิด
					</p>
					<p class="grid_8">
						<?php echo $rs_user["birthdate"]; ?>
					</p>
					<br class="clear"/>
					
					<p class="grid_2">
						สถาทที่เกิด
					</p>
					<p class="grid_8">
						<?php echo $rs_user["place_of_birth"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						อายุ
					</p>
					<p class="grid_8">
						<?php echo $rs_user["age"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สัญชาติ
					</p>
					<p class="grid_8">
						<?php echo $rs_user["nationality"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ศาสนา
					</p>
					<p class="grid_8">
						<?php echo $rs_user["religion"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ส่วนสูง
					</p>
					<p class="grid_8">
						<?php echo $rs_user["height"]; ?> 
					</p>
					<br class="clear"/>
					<p class="grid_2">
						น้ำหนัก
					</p>
					<p class="grid_8">
						<?php echo $rs_user["weight"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						หมู่เลือด
					</p>
					<p class="grid_8">
						<?php echo $rs_user["blood"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ตำหนิ
					</p>
					<p class="grid_8">
						<?php echo $rs_user["lesion"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ที่อยู่ปัจจุบัน
					</p>
					<p class="grid_8">
						<?php echo $rs_user["current_address"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						หมายเลขโทรศัพท์
					</p>
					<p class="grid_8">
						<?php echo $rs_user["phone_number"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						E-mail
					</p>
					<p class="grid_8">
						<?php echo $rs_user["email"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ชื่อคู่สมรส
					</p>
					<p class="grid_8">
						<?php echo $rs_user["pouse_name"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						จำนวนบุตร
					</p>
					<p class="grid_8">
						<?php echo $rs_user["number_of_children"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สถานะทางทหาร
					</p>
					<p class="grid_8 ">
						<?php $rs_user["military_status"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						สถานะที่อยู่
					</p>
					<p class="grid_8">
						<?php $rs_user["current_address_status"]; ?>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						สถานะ
					</p>
					<p class="grid_8">
						<?php echo $rs_user["relationship_status"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2">
						ชื่อบิดา
					</p>
					<p class="grid_2">
						<?php echo $rs_user["father_name"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2 prefix_2">
						อายุ
						<?php echo $rs_user["father_age"]; ?>
					</p>
					<p class="grid_2">
						อาชีพ
						<?php echo $rs_user["father_career"]; ?>
					</p>
					<p class="grid_4">
<?php 
								if($rs_user["father_live_status"]=="live"){
									?>มีชีวิต<?php
								}
								elseif($rs_user["father_live_status"]=="died"){
									?>ถึงแก่กรรม<?php
								}
?>
							
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ชื่อมารดา
					</p>
					<p class="grid_2">
						<?php echo $rs_user["mother_name"]; ?>
					</p>
					<br class="clear"/>
					<p class="grid_2 prefix_2">
						อายุ : 
						<?php echo $rs_user["mother_age"]; ?>
					</p>
					<p class="grid_2">
						อาชีพ
						<?php echo $rs_user["mother_career"]; ?>
					</p>
					<p class="grid_4">
						<label for="mother_live_status1" class="alt-label">
							<?php 
								if($rs_user["mother_live_status"]=="live"){
									?>มีชีวิต<?php
								}
								elseif($rs_user["mother_live_status"]=="died"){
									?>ถึงแก่กรรม<?php
								}
							?>
					</p>
					<br class="clear"/>
<?php
					$rs_user_ref="
						SELECT *
						FROM  `buildthedot_thaijobhd_user_account_reference_contacts`
						WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
					";
					$result_user_ref = @mysql_query($rs_user_ref);
					$rs_user_ref = @mysql_fetch_array($result_user_ref)
?>
					<p class="grid_4">
						บุคคลอ้างอิงที่ติดต่อได้
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ชื่อ
					</p>
					<p class="grid_2">
						<?php echo $rs_user_ref["name"]; ?>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ความสัมพันธ์
					</p>
					<p class="grid_2">
						<?php echo $rs_user_ref["relationship"]; ?>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						สถานที่ทำงาน
					</p>
					<p class="grid_2">
						<?php echo $rs_user_ref["workplace"]; ?>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						ตำแหน่ง
					</p>
					<p class="grid_2">
						<?php echo $rs_user_ref["position"]; ?>
					</p>
					<br class="clear"/>
		
					<p class="grid_2">
						หมายเลขโทรศัพท์
					</p>
					<p class="grid_2">
						<?php echo $rs_user_ref["phone_number"]; ?>
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
						
						
<?php
						//############ Paging ############
						echo pagination($page_limit, $page, $rootadminpath."business-idea.php?page=", $number_of_items); //call function to show pagination
						
							/*
							$sql="
								SELECT * 
								FROM  `buildthedot_thaijobhd_job_idea`
								LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
							";
							$result = @mysql_query($sql);
							$number_of_items = @mysql_num_rows($result);
							$number_of_pages = ((int)(($number_of_items-1)/$page_limit))+1;
?>
								<ul class="pagination">
									<li class="details">Page <?php echo $page; ?> of <?php echo $number_of_pages; ?></li>
	<?php
									for($i=1;$i<=$number_of_pages;$i++){	//Page Button
	?>
										<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo $i; ?>" <?php if($page==$i){ ?>class="current" <?php } ?>><?php echo $i; ?></a></li>
	<?php
									}
									if($_GET["page"]<$number_of_pages){	//Next Button
	?>
										<li><a href="main-knowledge.php?id=<?php echo $_GET["id"]; ?>&glvl=<?php echo $_GET["glvl"]; ?>&page=<?php echo ($_GET["page"]+1); ?>">Next</a></li>
	<?php
									}
	?>
								</ul>
<?php
							//########## End Paging ##########
							*/
?>
					</div> <!-- end content-module-main -->
				</div> <!-- end content-module -->
		</div> <!-- end content -->
<?php
	include ($rootadminpath . "include/footer.php");
	}
}//end check user session
?>