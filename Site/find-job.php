<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>       
<?php include("admin/include/connect-to-database.php");
session_start();
$rootpath="../";
$rootadminpath="./";
include("lib/func_pagination.php");
include("admin/include/initial/pagination.php");
?>     
    <?php
    	$i=1;
		if($_GET["page"] =="")
		{
			$_GET["page"] = 1;
		}
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
		while($rs=@mysql_fetch_array($result)){
				echo $rs['JobID']."<br>";
		}
    		echo pagination($page_limit, $page, $rootadminpath."find-job.php?page=", $number_of_items); //call function to show pagination
		
    ?>
    <div id="content" class="container_12">
        <div class="grid_12" id="main">
        	<div id="head-title">
    		<h1>หางาน</h1>
        </div>
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing<span id="job-type">- Full Time</span></h6>
            <h5 class="date">10 กันยายน 2556</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
            
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing<span id="job-type">- Full Time</span></h6>
             <h5 class="date">10 กันยายน 2556</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
            
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing<span id="job-type">- Part Time</span></h6>
             <h5 class="date">10 กันยายน 2556</h5>
            <p class="border-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
            
            <h6 id="headline">Lorem Ipsum is simply dummy text of the printing<span id="job-type">- Part Time</span></h6>
            <h5 class="date">10 กันยายน 2556</h5>
            <p class="border-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span id="read-more"><a href="#">อ่านต่อ</a></span></p>
     
        </div>        
        <div class="grid_12" id="page-num">
            <ul>
            	<li><a href="#"></a></li>
                <li class="active-page"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div>
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