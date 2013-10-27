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
			<div id="search-bar" class="container_12">       			
				<form action="#" method="POST" id="search-form" class="center"  class="grid_12">
					<fieldset>
						<label for="keyword">ค้นหางาน</label>
						<input type="text" id="keyword" class="round" placeholder="งานที่สนใจ" />
						<input type="submit" value="" class="round black ic-search" />
					</fieldset>
				</form>
		  </div><!--end search-bar -->        
		  <div id="content" class="container_12">
		  	<div id="content-profile">
					<div id="head-title">
						<h1>ฝากประวัติ <span class="text-blue">-  แก้ไขประวัติการศึกษา</span></h1>
					</div>
					<p class="grid_2">ระดับการศึกษา</p>
					<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear" />
					<p class="grid_2">สถาบัน</p>
					<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
					<p class="grid_2">ปี</p>
					<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
					<p class="grid_2">วุฒิการศึกษา</p>
					<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear" />
		      <h2 class="grid_3"><a href="#" class="add-button black round">เพิ่ม</a></h2>
					<div id="content-profile-table">
						<div id="head-table1" class="grid_10">
							<p class="grid_2 center">ระดับการศึกษา</p>
							<p class="grid_3 center">สถาบัน</p>
							<p class="grid_1 center">ปี</p>
							<p class="grid_2 center">วุฒิการศึกษา</p>
							<p class="grid_2 center"></p>
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
						<div id="content-profile-table">
							<div id="table-content">
								<p class="grid_2 center">-</p>
								<p class="grid_3 center">-</p>
								<p class="grid_1 center">-</p>
								<p class="grid_2 center">-</p>
			         </div>
						</div>
						<br class="clear"/>
<?php
					}
					else{
						while($rs_edu = @mysql_fetch_array($result_edu)){
?>
							<div id="content-profile-table">
								<div id="table-content">
									<p class="grid_2 center"><?php echo $rs_edu["education_level"]; ?></p>
									<p class="grid_3 center"><?php echo $rs_edu["Institution"]; ?></p>
									<p class="grid_1 center"><?php echo $rs_edu["year_start"]."-".$rs_edu["year_end"]; ?></p>
									<p class="grid_2 center"><?php echo $rs_edu["educational_background"]; ?></p>
									<p class="grid_1 center"><a href="#" class="text-blue">แก้ไข</a></p>
									<p class="grid_1 center"><a href="#" class="text-red">ลบ</a></p>
				         </div>
							</div>
							<br class="clear"/>
<?php
						}
					}
?>
					<p class="grid_12 center"><a href="#" class="save-button blue round">ออก</a></p>
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>