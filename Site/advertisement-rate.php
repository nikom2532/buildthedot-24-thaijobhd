<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");  
?>
<div id="content" class="container_12">
	<div class="grid_12" id="ads">
		<div id="head-title">
			<h1>อัตราโฆษณา</h1>
		</div>
		<div class="grid_5">
			<h2 class="text-grey">ตำแหน่งโฆษณา</h2>
			<div><img src="admin/images/bannerChart.png" /></div>
			<p><?php
				$sql="
					SELECT `detail`
					FROM  `buildthedot_thaijobhd_detail` 
					WHERE `title` = 'advertisement-rate1'
				;";
				$result=@mysql_query($sql);
				while($rs=@mysql_fetch_array($result)){
					echo $rs["detail"];
				}
			?></p>
		</div>

		<div class="grid_6">
			<h2 class="prefix_1 text-grey">ติดต่อโฆษณา</h2>
			<p class="prefix_1"><?php
				//โทร (622) 999 9999
			?></p>
			<p class="prefix_1"><?php
				//Email  a@b.com
			?></p>
			<p class="prefix_1"><?php
				$sql="
					SELECT `detail`
					FROM  `buildthedot_thaijobhd_detail` 
					WHERE `title` = 'advertisement-rate2'
				;";
				$result=@mysql_query($sql);
				while($rs=@mysql_fetch_array($result)){
					echo $rs["detail"];
				}
			?></p>
		</div>

	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>