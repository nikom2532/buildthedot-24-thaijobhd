<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
// $_SESSIONS["userid"] = "";
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
			<div id="header" class="container_12">
				<div id="login-intro" class="grid_3">
					<img src="images/logo.png" alt="ThaiJobHD" width="130" height="71">	
				</div>
				<div class="right">
					<ul id="my-profile">
						<li><a href="#" class="text-blue">My Profile</a></li>
						<li><a href="#" class="text-grey">Logout</a></li>
					</ul>
				</div>
				<div id="top-nav" class="grid_8 prefix_1">
					<ul>
						<li>
							<a href="index.php">หน้าหลัก
							<br/>
							<span id="sub-memu">JobHD</span></a>
						</li>
						<li>
							<a href="find-job.php">หางาน
							<br/>
							<span id="sub-memu">สมัครงาน</span></a>
						</li>
						<li>
							<a href="view-profile.php">ฝากประวัติ
							<br/>
							<span id="sub-memu">สมัครงาน</span></a>
						</li>
						<li>
							<a href="business-idea.php">ไอเดียธุรกิจ
							<br/>
							<span id="sub-memu">สมัครงาน</span></a>
						</li>
						<li>
							<a href="advertisement-rate.php">อัตราโฆษณา
							<br/>
							<span id="sub-memu">ประกาศ</span></a>
						</li>
						<li>
							<a href="condition.php">เงื่อนไข
							<br/>
							<span id="sub-memu">ข้อตกลง</span></a>
						</li>
						<li>
							<a href="contact-us.php">ติดต่อทีมงาน
							<br/>
							<span id="sub-memu">ติดต่อเรา</span></a>
						</li>
					</ul>
				</div>
			</div><!--end header -->   
			<div id="content" class="container_12">
				<div id="content-profile">
					<div id="head-title">
						<h1>ฝากประวัติ</h1>
					</div>
			
					<h2 id="sub-title">ประวัติส่วนตัว <span class="right"><a href="#" class="button round black right">แก้ไข</a></span></h2>
					<h3 class="text-grey"><?php echo $rs_user["firstname"]." ".$rs_user["midname"]." ".$rs_user["lastname"]; ?></h3>
					<div><img src="images/banner-2.png" width="144" height="143">
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
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
					<br class="clear"/>
			
					<p class="grid_2">
						Lorem Ipsum
					</p>
					<p class="grid_8">
						Lorem Ipsum
					</p>
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
			
					<h2 id="sub-title">ประวติการศึกษา<span class="right"><a href="#" class="button round black right">แก้ไข</a></span></h2>
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
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_3 center">
								มหาวิทยาลัยเกษตรศาสตร์
							</p>
							<p class="grid_1 center">
								1111-1111
							</p>
							<p class="grid_2 center">
								ปริญญาตรี
							</p>
						</div>
					</div>
					<br class="clear"/>
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_3 center">
								จุฬาลงกรณ์มหาวิทยาลัย
							</p>
							<p class="grid_1 center">
								1111-1111
							</p>
							<p class="grid_2 center">
								ปริญญาตรี
							</p>
						</div>
					</div>
					<br class="clear"/>
			
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
								บริษัท
							</p>
							<p class="grid_1 center">
								ปี
							</p>
							<p class="grid_2 center">
								แผนก
							</p>
						</div>
					</div>
					<br class="clear"/>
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_3 center">
								มหาวิทยาลัยเกษตรศาสตร์
							</p>
							<p class="grid_1 center">
								1111-1111
							</p>
							<p class="grid_2 center">
								ปริญญาตรี
							</p>
						</div>
					</div>
					<br class="clear"/>
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_3 center">
								จุฬาลงกรณ์มหาวิทยาลัย
							</p>
							<p class="grid_1 center">
								1111-1111
							</p>
							<p class="grid_2 center">
								ปริญญาตรี
							</p>
						</div>
					</div>
					<br class="clear"/>
			
					<h2 id="sub-title">ความสมารถพิเศษ<span class="right"><a href="#" class="button round black right">แก้ไข</a></span></h2>
					<p class="grid_2">
						ทักษะด้านภาษา
					</p>
					<br class="clear"/>
					<div class="prefix_2">
						<div id="head-table1" class="grid_9">
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
							<p class="grid_2 center">
								Lorem Ipsum
							</p>
						</div>
					</div>
					<br class="clear"/>
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
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
					<br class="clear"/>
					<div class="prefix_2">
						<div class="grid_9" id="table-content">
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
					<br class="clear"/>
			
					<p class="grid_2">
						ความสามารถพิเศษ
					</p>
					<br class="clear"/>
					<div class="prefix_2">
						<p class="grid_4">
							Lorem Ipsum
						</p>
						<br class="clear"/>
						<p class="grid_4">
							Lorem Ipsum
						</p>
					</div>
				</div>
			</div><!--end content -->
<?php
			include ("include/footer.php");
		} //end sql_user
}//end check user session
?>