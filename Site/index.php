<script src="js/jquery-1.7.1.min.js"></script>
<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
include ($rootpath . "include/search-bar.php");
?>
<?php /* ?>
<!--start banner -->
<div id="banner-1">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-3">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-5">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-7">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-9">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<!-- <div id="banner-1">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-2">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-3">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-4">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-5">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div> -->
<!--end banner side-left -->
<div id="banner-2">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-4">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-6">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-8">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<div id="banner-10">
	<img src="admin/images/banner-2.png" width="144" height="143">
</div>
<!--end banner side-right -->
<?php */ ?>
<div  id="slide-image" class="container_12">
	<img src="images/slide-image.jpg" width="1000" height="280" alt="images">
</div><!--end slide-image-->
<div id="content" class="container_12">
	<div class="grid_2 margin-left-5 margin-right-5">
		<div id="banner-1">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-3">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-5">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-7">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-9">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
	</div>
	<div class="grid_8"><?php //Center Content ?>
		<div id="head-title">
			<h1>งานแนะนำ</h1>
		</div>
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Full Time <span class="right"><a href="#" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE Recomment = '1' AND JobType = '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="red"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php echo $rs['JobDescription']; ?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
					
					}
				}
			?>
			
			<div id="banner">
				<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
			</div>
		</div>
	
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Part Time <span class="right"><a href="#" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE Recomment = '1' AND JobType != '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="red"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php echo $rs['JobDescription']; ?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
					
					}
				}
			?>

			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p 
			-->
			
			<div id="banner">
				<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
			</div>
		</div>
	
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>งานใหม่ล่าสุด </h1>
		</div>
	
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Full time<span class="right"><a href="#" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE JobType = '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="red"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php echo $rs['JobDescription']; ?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
					
					}
				}
			?>
			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p-->
		</div>
		<div class="grid_4 margin-left-5 margin-right-5" id="content-reccommend">
			<h2 id="sub-title">Part time<span class="right"><a href="#" class="button round black">ดูทั้งหมด</a></span></h2>
			<?php
				$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE JobType != '1'
				ORDER BY JobID DESC	
				LIMIT 0,3				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						?>
			            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="red"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
			            <p><?php echo $rs['JobDescription']; ?>
			            <span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
			        <?php
					
					}
				}
			?>
			<!--h6 id="headline">Lorem Ipsum is simply dummy text of the printing</h6>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</p-->
		</div>
	
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>บริษัทชั้นนำ</h1>
		</div>
		<div id="top-company">
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
		</div>
		<div id="top-company">
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<div class="grid_2 margin-left-5 margin-right-5"><img src="images/banner-2.png" width="144" height="143">
			</div>
			<h2 class="right"><a href="#" class="button round black">ดูทั้งหมด</a></h2>
		</div>
	
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>ไอเดียธุรกิจแนะนำ </h1>
		</div>
		<div id="recommend-idea" class="grid_8">
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
		</div>
		<h2 class="right"><a href="#" class="button round black">ดูทั้งหมด</a></h2>
		
		<br class="clear seperator"/>
	
		<div id="head-title">
			<h1>ไอเดียธุรกิจมาใหม่ </h1>
		</div>
		<div id="recommend-idea" class="grid_8">
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
			<div class="grid_3">
				<img src="images/banner-2.png" width="144" height="143">
				<h3>Lorem Ipsum</h3>
				<p>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <span class="right" id="read-more"><a href="#">อ่านต่อ</a></span>
				</p>
			</div>
		</div>
		
		<h2 class="right"><a href="#" class="button round black">ดูทั้งหมด</a></h2>
		<br class="clear seperator"/>
	
		<div class="grid_4 margin-left-5 margin-right-5">
			<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
		</div>
		<div class="grid_4 margin-left-5 margin-right-5">
			<img src="images/banner-1.png" width="100%" <?php // width="458" height="175" ?> alt="Banner">
		</div>
	</div><?php //End Center Content ?>
	<div class="grid_2 margin-left-5 margin-right-5">
		<div id="banner-2">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-4">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-6">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-8">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
		<div id="banner-10">
			<img src="admin/images/banner-2.png" width="144" height="143">
		</div>
	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>