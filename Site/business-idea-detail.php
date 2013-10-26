<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
?>
<div id="content" class="container_12">
	<div id="content-detail">
		<div id="head-title">
			<h1>ไอเดียธุรกิจ</h1>
		</div>
		<section id="content-detail" class="grid_12">
<?php
			$CompanyID = $_GET["id"];
			$i=1;
			if($_GET["page"] ==""){
				$_GET["page"] = 1;
			}
			// $sql="
				// SELECT * 
				// FROM  `buildthedot_thaijobhd_job_idea`
				// WHERE `CompanyID` = '{$CompanyID}'
				// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
			// ";
			$sql="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				WHERE `CompanyID` = '{$CompanyID}' ;
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
				<div class="grid_2" id="image-detail">
					<ul>
						<li>
<?php 
							$path = $rootpath."images/"; 
							if($rs["Pic1"] == ""){
								$path .= "banner-2.png";
							}
							else{
								$path .= "business-idea/".$rs["Pic1"];
							}
?>
							<a src="<?php echo $path; ?>" target="_blank"><img src="<?php echo $path; ?>" width="150" alt="picture" /></a>
						</li>
<?php 
							$path = $rootpath."images/"; 
							if($rs["Pic2"] == ""){
								$path .= "banner-2.png";
							}
							else{
								$path .= "business-idea/".$rs["Pic2"];
							}
?>
						<li>
							<a src="<?php echo $path; ?>" target="_blank"><img src="<?php echo $path; ?>" width="150" alt="picture" /></a>
						</li>
<?php 
							$path = $rootpath."images/"; 
							if($rs["Pic3"] == ""){
								$path .= "banner-2.png";
							}
							else{
								$path .= "business-idea/".$rs["Pic3"];
							}
?>
						<li>
							<a src="<?php echo $path; ?>" target="_blank"><img src="<?php echo $path; ?>" width="150" alt="picture" /></a>
						</li>
					</ul>
				</div>
				<div class="grid_9">
					<h6 id="headline"><?php echo $rs["MainIdea"]; ?></h6>
					<h5 class="date"><?php echo $rs["IdeaTime"]; ?></h5>
					<p><?php echo $rs["Description1"]; ?></p>
					<p><?php echo $rs["Description2"]; ?></p>
					<p><?php echo $rs["Description3"]; ?></p>
				</div>
<?php
			}
?>
		</section>
	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>