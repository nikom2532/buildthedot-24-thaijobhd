<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="job.php">งาน</a></li>
				<li><a href="business-idea.php">ไอเดียธุรกิจ</a></li>
				<li><a href="edit-advertisement.php" class="active-tab">โฆษณา</a></li>
                <li><a href="top-company.php">บริษัทชั้นนำ</a></li>
			</ul> <!-- end tabs -->
			
			<!-- company logo -->
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content">
		

			<div class="content-module">
				
				<div class="content-module-main">
                    <div id="head-title">
                    	<h1>โฆษณา </h1>
                	</div>
                    <h2>Content Ads</h2>
                    <h6>** ขนาด 200*200 px. | ชื่อรูปขึ้นต้นด้วย contentAds ตามด้วยหมายเลข 1-4 </h6>
                    <h2>Side Ads</h2>
                    <h6>** ขนาด 350*200 px. | ชื่อรูปขึ้นต้นด้วย sideAds ตามด้วยหมายเลข 1-4 </h6>
					<div id="content-detail" class="container_12">
                    <form id="form-advertisement">
                    <div class="grid_7">
                    <section class="grid_7">
       	
                          <div class="grid_1">
                             <h6>เลือกรูป</h6>
                          </div>
                          <div class="grid_4">
                          		<a href="#">contentAds1.png</a>
                          </div>
                          <div class="grid_1">
                          		<a href="#" class="text-blue">เลือกรูป</a>
                          </div><br class="clear"/>
                          <div class="prefix_1 grid_5">
                          		<input type="text" id="name" name ="name" class="round"value="http://wwww.xxx.com"/>
                          </div><br class="clear"/>
                          <div class="grid_6 center">
                          		<a href="#" class="save-button blue round">บันทึก</a>
                          </div>
                          
            		</section> <br class="clear"/>

                    </div>
                    <section class="grid_4">
                   	 	<img src="images/banner-1.png" width="600" height="175">   
                    </section>
                                      
                    </form>
                    </div>         
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
			
	</div> <!-- end content -->
	
<?php include("include/footer.php");?>