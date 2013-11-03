<script src="js/jquery-1.7.1.min.js"></script>
<?php
@session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
include ($rootpath . "include/top-menu.php");
//include ($rootpath . "include/search-bar.php");
include($rootpath."lib/func_pagination.php");
include($rootpath."include/initial/pagination.php");
?>
<div id="content" class="container_12">
	<!--        <div class="grid_12" id="content-reccommend"> -->
	<div id="head-title">
		<h1>บริษัทชั้นนำ</h1>
	</div>
	
	<div id="top-company">
<?php
		$sql_top_company="
			SELECT * 
			FROM  `buildthedot_thaijobhd_top_company`
		";
		$result_top_company=@mysql_query($sql_top_company);
		$number_of_items=@mysql_num_rows($result_top_company);
		$sql_top_company="
			SELECT * 
			FROM  `buildthedot_thaijobhd_top_company`
			LIMIT {$start} , {$page_limit} ;
		";
		$result_top_company=@mysql_query($sql_top_company);
		while($rs_top_company=@mysql_fetch_array($result_top_company)){
?>
			<div class="grid_2"><a href="<?php echo "../../".$rs_top_company["LinkAddress"]; ?>" target="_blank"><img src="images/top_company/<?php echo $rs_top_company["CompanyPic"]; ?>" width="144" height="143" /></a>
			</div>
<?php
		}
?>
	</div>
<?php
	//############ Paging ############
	echo pagination($page_limit, $page, $rootadminpath."top-company.php?page=", $number_of_items); //call function to show pagination
?>
	<!--<div class="grid_12" id="page-num">
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
	</div> -->
</div><!--end content -->
<?php
	include ("include/footer.php");
?>