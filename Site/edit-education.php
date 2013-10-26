<?php
include ("include/header.php");
?>
<div id="wrapper">
	<div id="header" class="container_12">
		<div id="login-intro" class="grid_3">
			<img src="images/logo.png" alt="ThaiJobHD" width="130" height="71">	
		</div>
		<div class="right">
			<ul id="my-profile">
				<li><a href="view-profile.php" class="text-blue">Wc Fone</a></li>
				<li><a href="#" class="text-grey">Logout</a></li>
			</ul>
		</div>
		<div id="top-nav" class="grid_8 prefix_1">
			<ul>
				<li><a href="index.php">หน้าหลัก<br/><span id="sub-memu">JobHD</span></a></li>
				<li><a href="find-job.php">หางาน<br/><span id="sub-memu">สมัครงาน</span></a></li>
				<li><a href="business-idea.php">ไอเดียธุรกิจ<br/><span id="sub-memu">สมัครงาน</span></a></li>
				<li><a href="advertisement-rate.php">อัตราโฆษณา<br/><span id="sub-memu">ประกาศ</span></a></li>
				<li><a href="condition.php">เงื่อนไข<br/><span id="sub-memu">ข้อตกลง</span></a></li>
				<li><a href="contact-us.php">ติดต่อทีมงาน<br/><span id="sub-memu">ติดต่อเรา</span></a></li>
			</ul>	
		</div>
	</div><!--end header -->   
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
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear" />
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear" />
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
			<p class="grid_2">Lorem Ipsum</p>
			<p class="grid_8"><input type="text" id="name" name ="name" class="round" /></p><br class="clear"/>
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
			<div id="content-profile-table">
				<div id="table-content">
					<p class="grid_2 center">Lorem Ipsum</p>
					<p class="grid_3 center">มหาวิทยาลัยเกษตรศาสตร์</p>
					<p class="grid_1 center">1111-1111</p>
					<p class="grid_2 center">ปริญญาตรี</p>
					<p class="grid_1 center"><a href="#" class="text-blue">แก้ไข</a></p>
					<p class="grid_1 center"><a href="#" class="text-red">ลบ</a></p>
         </div>
			</div>
			<br class="clear"/>
			<div id="content-profile-table">
				<div id="table-content">
					<p class="grid_2 center">Lorem Ipsum</p>
					<p class="grid_3 center">มหาวิทยาลัยเกษตรศาสตร์</p>
					<p class="grid_1 center">1111-1111</p>
					<p class="grid_2 center">ปริญญาตรี</p>
					<p class="grid_1 center"><a href="#" class="text-blue">แก้ไข</a></p>
					<p class="grid_1 center"><a href="#" class="text-red">ลบ</a></p>
				</div>
			</div>
			<br class="clear"/>
			<div id="content-profile-table">
					<div id="table-content">
						<p class="grid_2 center">Lorem Ipsum</p>
						<p class="grid_3 center">มหาวิทยาลัยเกษตรศาสตร์</p>
						<p class="grid_1 center">1111-1111</p>
						<p class="grid_2 center">ปริญญาตรี</p>
						<p class="grid_1 center"><a href="#" class="text-blue">แก้ไข</a></p>
						<p class="grid_1 center"><a href="#" class="text-red">ลบ</a></p>
					</div>
			</div>
			<br class="clear"/>
			<p class="grid_12 center"><a href="#" class="save-button blue round">บันทึก</a></p>
		</div>	
	</div><!--end content -->
<?php
include ("include/footer.php");
?>