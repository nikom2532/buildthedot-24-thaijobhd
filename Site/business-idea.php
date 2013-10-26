<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
?>
<div id="content" class="container_12">
	<div id="">
		<div id="head-title">
			<h1>ไอเดียธุรกิจแนะนำ </h1>
		</div>
<?php
		$i=1;
		if($_GET["page"] ==""){
			$_GET["page"] = 1;
		}
		// $sql="
			// SELECT * 
			// FROM  `buildthedot_thaijobhd_job_idea`
			// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
		// ";
		$sql="
			SELECT * 
			FROM  `buildthedot_thaijobhd_job_idea`
		";
		$result=@mysql_query($sql);
		$number_of_items=@mysql_num_rows($result);
		 // $sql="
			// SELECT * 
			// FROM  `buildthedot_thaijobhd_job_idea` 
		 	// LIMIT {$start} , {$page_limit} ;
		// ";
		// $result=@mysql_query($sql);
		while($rs=@mysql_fetch_array($result)){
?>
			<section id="content-list" class="grid_12">
				<p class="grid_2"><img src="<?php echo $rootpath; ?>images/<?php
					if(($rs["Pic1"] == "")&&($rs["Pic2"] == "")&&($rs["Pic3"] == "")){
						echo "banner-2.png";
					}
					else{
						echo "business-idea/";
						if($rs["Pic1"] != ""){
							echo $rs["Pic1"];
						}
						elseif($rs["Pic2"] != ""){
							echo $rs["Pic2"];
						}
						elseif($rs["Pic3"] != ""){
							echo $rs["Pic3"];
						}
					}
				?>" width="150" alt="picture" />
				</p>
				<p class="grid_9">
					<?php echo $rs["Description1"]; ?><span id="read-more"><a href="business-idea-detail.php">อ่านต่อ</a></span>
				</p>
			</section>
<?php
		}
?>
		<?php /* ?>
		<section id="content-list" class="grid_12">
			<p class="grid_2"><img src="images/banner-2.png" alt="pictur">
			</p>
			<p class="grid_9">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="business-idea-detail.php">อ่านต่อ</a></span>
			</p>
		</section>
		<section id="content-list" class="grid_12">
			<p class="grid_2"><img src="images/banner-2.png" alt="pictur">
			</p>
			<p class="grid_9">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="business-idea-detail.php">อ่านต่อ</a></span>
			</p>
		</section>
		<?php */ ?>

	</div>
	<div class="grid_12" id="page-num">
		<ul>
			<li>
				<a href="#"><<</a>
			</li>
			<li class="active-page">
				<a href="#">1</a>
			</li>
			<li>
				<a href="#">2</a>
			</li>
			<li>
				<a href="#">3</a>
			</li>
			<li>
				<a href="#">4</a>
			</li>
			<li>
				<a href="#">5</a>
			</li>
			<li>
				<a href="#">>></a>
			</li>
		</ul>
	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>