<?php 
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");  
?> 
<?php
				if(isset($_SESSION['userid']))
				{
					$id = $_SESSION['userid'];
				}
				else {
					$id = "";
				}
			
			?>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
	$(document).ready(function(){
		$("#register-button").click(function(){
			
			var job_id = <?php echo $_GET['id'];?>; 
			var user_id = $(this).attr("title");
			//<?php //echo $id;?>
			if(user_id == null || user_id == "")
			{
			//		alert("Please Sing in.");
			}
			
			if(user_id == null || user_id == ""){
				alert("Please Sing in.");
			}
			else
			{
				$.post("include/module/send-resume-process.php",{ user_id : user_id, job_id : job_id} , function(data){
					if(data)
					{
						//alert(data);
						//$(location).attr("");
						window.location="find-job-success.php";
					}
					else
					{
						window.location="find-job-fail.php";
					}
					
				});
			}
			/*
			/*$.post("search-process.php",
			{
				
			},function(data)
			{
				
			}
			*/
		});
		
	});
	
	
</script> 

    <div id="content" class="container_12">
        <div id="content-detail">
        	<div id="head-title">
    			<h1>หางาน</h1>
    		</div>
            <section id="content-detail" class="grid_12">
                 <div class="grid_9">
                  	<?php 
		    			$jobID = $_GET['id'];
						
						$sql="
						SELECT * 
						FROM  buildthedot_thaijobhd_job 
						WHERE JobID = '$jobID'
						LIMIT 0 , 1 ;
						";
						$result=@mysql_query($sql);
						while($rs=@mysql_fetch_array($result))
						{	
							$name =  $rs['CompanyName'] . " : " . $rs['PositionThai'];
							$description = $rs['JobDescription'];
							$pl = $rs['Place'];
							$s = $rs['Saraly'];
							$q = $rs['Quantity'];
						}
    				?>
                     <h6 id="headline"><?php echo $name; ?></h6>
                     <h5 class="date"><?php echo date("D-M-Y"); ?></h5>
                     <p><?php echo $description; ?>
                     </p>
                  <h6 class="detail-title">สถานที่ปฏิบัติงาน</h6>
                 	 <p><?php echo $pl; ?></p>
                  <h6 class="detail-title">เงินเดือน</h6>
                  	<p><?php echo $s; ?> บาท</p>
                  <h6 class="detail-title">คุณสมบัติ</h6>
                  <?php
                  		$sql="
						SELECT  AtrributDescription
						FROM  buildthedot_thaijobhd_job_attribute 
						WHERE JobID = '$jobID'
					
						";
						$result=@mysql_query($sql);
                  ?>
                  	<ul id="detail-bullet">
                  <?php	
                  		while($rs=@mysql_fetch_array($result))
						{	
					?>
                    	<li><?php echo $rs['AtrributDescription'];?></li>
            		<?php
						}
            		?>
                    </ul>
            	</div><!--end grid_9 -->
                <div class="grid_2 center" id="available-box">
                    <b class="center"><?php echo "ว่าง ". $q . " ตำแหน่ง"; ?></b>
                    <b class="button blue" id="register-button" title="<?php echo $id;?>">สมัครงาน</b>
               			
                </div>
                </div>
            </section>           
        </div>        
    </div><!--end content -->
<?php include("include/footer.php");?>