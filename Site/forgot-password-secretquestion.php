<?php include("include/header.php");?>
<body>
<div id="wrapper">
	<!-- HEADER -->
	<div id="header" class="container_12">
		
		 <div id="login-intro" class="grid_3">
			<img src="images/logo.png" width="128" height="71">
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content" class="container_12">
		 <div id="content-login">
        	<div id="head-title">
    			<h1>ลืมรหัสผ่าน <span class="text-blue">- คำถามลับ</span></h1>
    		</div> 
            <form action="#" method="POST" id="login-form"  autocomplete="off">
				<p class="grid_2 prefix_3 uppercase">คำถาม</p>
           	 	<p class="grid_5"><input type="text" id="question" name ="question" class="round" /></p><br class="clear" />
				<p class="grid_2 prefix_3 uppercase">คำตอบ</p>
           	 	<p class="grid_5"><input type="text" id="answer" name ="answer" class="round" /></p><br class="clear" />
               
                <p class="grid_2 prefix_5"><input type="submit" class="login-button blue round" value="Submit"></p>
    			
            </form>
		</div>
	</div> <!-- end content -->
	<!-- FOOTER -->
<?php include("include/footer.php");?>