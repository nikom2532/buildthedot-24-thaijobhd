<?php include("include/header.php");?>
<?php
@session_start();
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
    		<h1>งานใหม่</h1>
    		
        </div>
        <span id="job-type"><h2>Full Time</h2></span>
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
				FROM  buildthedot_thaijobhd_job
				WHERE JobType = '1'
				ORDER BY JobID DESC	
			";
			$result=@mysql_query($sql);
			$number_of_items=@mysql_num_rows($result);
			$sql="
				SELECT * 
				FROM  buildthedot_thaijobhd_job
				WHERE JobType = '1'
				ORDER BY JobID DESC	
			LIMIT {$start} , {$page_limit} ;
			";
			$result=@mysql_query($sql);
			while($rs=@mysql_fetch_array($result))
			{
			//	
		?>
            <h6 id="headline"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>"><font color="black"><?php echo $rs['CompanyName'] . " : " . $rs['PositionThai'];?></font></a></h6>
            <h5 class="date"><?php echo date("D-M-Y"); ?></h5>
            <?php echo substr($rs['JobDescription'],0,250)."..."; ?>
            <p><span id="read-more"><a href="find-job-detail.php?id=<?php echo $rs['JobID']; ?>">อ่านต่อ</a></span></p>
        <?php
       	 	}
       		//call function to show pagination
	    ?>
        </div>        
       <?php
       	echo pagination($page_limit, $page, $rootadminpath."find-job-new-fulltime.php?page=", $number_of_items); 
        ?>
    </div><!--end content -->
    
    <div id="footer" class="container_12">
    	<div class="grid_2">
        	<img src="images/logo.png" width="128" height="71">
        </div>
        <div class="grid_3">
        	<p>สอบถามการสมัครงาน <br/>(662)999-9999 </p>
            <p>E-mail<br/>abc@mail.com </p>
        </div>
        <div class="grid_3 prefix_4">
        	<div class="right">
            	<ul>
                	<li><img src="images/Facebook.png" width="52" height="52" alt="Facebook"></li>
                    <li><img src="images/Twitter.png" width="52" height="52" alt="Twitter"></li>
                    <li><img src="images/LinkedIn.png" width="52" height="52" alt="LinkedIn"></li>
                </ul>
            </div>
            <br class="clear"/>
            <div id="copyright" class="right">&copy; ThaiJobHD 2013. All rights reserved.</div>
        </div>
    </div>    

</div><!--end  wrapper-->
</body>
</html>

<?php
	function get()
	{
		if($_GET["page"] =="")
		{
				$_GET["page"] = 1;
		}
	}
?>