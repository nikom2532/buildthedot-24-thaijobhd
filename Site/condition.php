<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");  
?>

<div id="content" class="container_12">
	<div class="grid_12" id="condition">
		<div id="head-title">
			<h1>เงื่อนไข</h1>
		</div>
		<p><?php /*
			Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
		*/ ?></p>
		<p><?php
			$sql="
				SELECT `detail`
				FROM  `buildthedot_thaijobhd_detail` 
				WHERE `title` = 'condition1'
			;";
			$result=@mysql_query($sql);
			while($rs=@mysql_fetch_array($result)){
				echo $rs["detail"];
			}
		?></p>
		<ul id="detail-bullet"><?php 
			/*
			<li>
				Lorem Ipsum is simply dummy text
			</li>
			*/ 
			?><li><?php
				$sql="
					SELECT `detail`
					FROM  `buildthedot_thaijobhd_detail` 
					WHERE `title` = 'condition2'
				;";
				$result=@mysql_query($sql);
				while($rs=@mysql_fetch_array($result)){
					echo $rs["detail"];
				}
			?></li>
		</ul>

	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>