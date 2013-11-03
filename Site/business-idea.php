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
			<h1>ไอเดียธุรกิจ<?php 
				if(isset($_GET['menu']))
				{
					$menu = $_GET["menu"];
				}
				else {
					$menu = "new";	
				}
				
				if($menu == "new"){
					echo "มาใหม่";
				}
				elseif($menu == "suggest"){
					echo "แนะนำ";
				}
				
			?></h1>
		</div>
<?php
		include("lib/func_pagination.php");
		include("include/initial/pagination.php");
		$i=1;
		// echo $_GET['page'];
		/*if($_GET["page"] ==""){
			$_GET["page"] = 1;
		}
		// $sql="
			// SELECT * 
			// FROM  `buildthedot_thaijobhd_job_idea`
			// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
		// ";*/
		if($menu == "new" || $menu == ""){
			$sql="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC
			";
		}
		elseif($menu == "suggest"){
			$sql="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				WHERE `IdeaRecomment` = 1
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC 
			";
		}
		$result=@mysql_query($sql);
		$number_of_items=@mysql_num_rows($result);	//find the sql num row
		
		if($menu == "new" || $menu == ""){
			$sql="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC
			";
		}
		elseif($menu == "suggest"){
			$sql="
				SELECT * 
				FROM  `buildthedot_thaijobhd_job_idea`
				WHERE `IdeaRecomment` = 1
				ORDER BY TIME(`IdeaTime`), `IdeaTime` DESC 
			";
		}
		$sql .= "
			LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit." ;
		";
		$result=@mysql_query($sql);
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
				?>" width="150" alt="business idea" />
				</p>
				<p class="grid_9">
					<?php echo $rs["MainIdea"]; ?>
					<br class="clear" />
					<?php echo $rs["Description1"]; ?><span id="read-more"><a href="<?php echo $rootpath; ?>business-idea-detail.php?id=<?php echo $rs["CompanyID"]; ?>">อ่านต่อ</a></span>
				</p>
			</section>
<?php
		}
?>
		<div class="grid_12">
<?php
			//############ Paging ############
			echo "a".pagination($page_limit, $page, $rootpath."business-idea.php?page=", $number_of_items); //call function to show pagination
?>
		</div>
	</div>
	
</div><!--end content -->
<?php
if($_GET["page"] =="")
	{
			$_GET["page"] = 1;
	}
include ("include/footer.php");
?>