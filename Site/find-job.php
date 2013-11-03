<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");       
include("lib/func_pagination.php");
include("admin/include/initial/pagination.php");
?>     
    <div id="content" class="container_12">
        <div class="grid_12" id="main">
        	<div id="head-title">
    		<h1>หางาน</h1>
        </div>
        <?php
	    	$i=1;
			@get();
			// $sql="
			// SELECT * 
			// FROM  `buildthedot_thaijobhd_job_idea`
			// LIMIT ".($page_limit*($_GET["page"]-1)).",".$page_limit.";
			// ";
			$sql="
			SELECT * 
			FROM  `buildthedot_thaijobhd_job`
			ORDER BY JobID DESC
			";
			$result=@mysql_query($sql);
			$number_of_items=@mysql_num_rows($result);
			$sql="
			SELECT * 
			FROM  `buildthedot_thaijobhd_job` 
			ORDER BY JobID DESC
			LIMIT {$start} , {$page_limit} ;
			";
			$result=@mysql_query($sql);
			while($rs=@mysql_fetch_array($result))
			{
			//	
		?>
            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a><span id="job-type">- 
            <?php if((int)$rs['JobType'] == 0){ ?> Part Time  <?php }else{ ?>Full Time <?php } ?></span></h6>
            <h5 class="date"><?php echo date("D-M-Y"); ?></h5>
            <?php echo substr($rs['JobDescription'],0,250)."..."; ?>
            <p><span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
        <?php
       	 	}
       		//call function to show pagination
	    ?>
        </div>        
      <font color="white"></font>
       <?php
      
       	echo "<font color='white'>s</font>".pagination($page_limit, $page, "find-job.php?page=", $number_of_items); 
        ?>
    </div><!--end content -->
    

<?php
	include ("include/footer.php");
	function get()
	{
		if($_GET["page"] =="")
		{
				$_GET["page"] = 1;
		}
	}
?>