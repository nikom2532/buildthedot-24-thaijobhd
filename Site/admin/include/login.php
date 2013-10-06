<?php /*
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CMS ThaiJobHD</title>	
	<!-- Stylesheets -->
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/reset.css" rel="stylesheet" type="text/css">
</head>
<body>
*/ ?>
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
			<img src="images/logo.png" width="128" height="71">
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		<h1 class="text-blue" id="cms">Content Management System</h1>
		<form action="<?php echo $rootadminpath; ?>include/module/login_process.php" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">username</label>
					<input type="text" id="login-username" name="email" class="round full-width-input" autofocus />
				</p>

				<p>
					<label for="login-password">password</label>
					<input type="password" id="login-password" name="password" class="round full-width-input" />
				</p>
				<p>
<?php 
					if($_GET["login_messaage"]=="login_false"){
						echo "login_false";
					}
					elseif($_GET["login_messaage"]=="forget_formdata_login"){
						echo "forget_formdata_login";
					}
?>
				</p>
				<a href="#" class="button round blue image-right login-btn" onclick="document.getElementById('login-form').submit();">LOG IN</a>
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p>Copyright &copy; 2013. ThaiJobHD All rights reserved.</p>
	</div> <!-- end footer -->
<?php /*
</body>
</html> 
*/ ?>