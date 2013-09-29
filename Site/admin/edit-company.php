<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="job.php">งาน</a></li>
				<li><a href="business-idea.php">ไอเดียธุรกิจ</a></li>
				<li><a href="advertisement.php">โฆษณา</a></li>
                <li><a href="top-company.php" class="active-tab">บริษัทชั้นนำ</a></li>
			</ul> <!-- end tabs -->
			
			<!-- company logo -->
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content">
		

			<div class="content-module">
				
				<div class="content-module-main">
                    <div id="head-title">
                    	<h1>บริษัทชั้นนำ <span>- Lorem Ipsum </span><span class="text-black">- แก้ไข </span></h1>
                	</div>
					<div id="content-detail" class="container_12">
                    <section>
                    	<form id="form-edit">
                          <div class="grid_2">
                             <h6 class="detail-title"> ชื่อบริษัท</h6>
                          </div>
                          <div class="grid_8">
                          		<p><input type="text" id="name" name ="name" class="round" value="Lorem Ipsum is simply dummy text of the printing"/></p>
                          </div><br class="clear"/>
                          <div class="grid_2">
                             <h6 class="detail-title">เลือกรูป</h6>
                          </div>
                          <div class="grid_8">
                          		<p><input type="file" name="img"></p>
                          </div><br class="clear"/>
                          <div class="grid_2">
                                <h6 class="detail-title">ลิงค์</h6>   
                          </div>
                          <div class="grid_8">
                          		<p><input type="text" id="name" name ="name" class="round" value="Lorem Ipsum is simply dummy text of the printing"/></p>
                          </div><br class="clear"/>
                           <div class="grid_2">
                                <h6 class="detail-title">Status</h6>   
                          </div>
                          <div class="grid_8">
                          		<p><label for="read" class="alt-label"><input type="radio" id="test" name="test" checked="checked" />
            					Active
            				</label>
							<label for="read" class="alt-label"><input type="radio" id="test" name="test" />
           						Inactive
            				</label> </p>
                          </div><br class="clear"/>
            		</section> 
                    </div>         
                     <div class="center"><a href="#" class="save-button blue round">บันทึก</a></div>
                   </form>
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
			
	</div> <!-- end content -->
	
<?php include("include/footer.php");?>