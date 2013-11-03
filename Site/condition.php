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
		<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
		</p>
		<ul id="detail-bullet">
			<li>
				Lorem Ipsum is simply dummy text
			</li>
			<li>
				Lorem Ipsum is simply dummy text
			</li>
			<li>
				Lorem Ipsum is simply dummy text
			</li>
			<li>
				Lorem Ipsum is simply dummy text
			</li>
		</ul>

	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>