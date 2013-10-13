<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src="http://localhost/buildthedot-24-thaijobhd/Site/js/jquery-1.7.1.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>New Web Project</title>
	<script>
	$(document).ready(function(){
		
	});
	</script>
	</head>
	
	<body>
		<?php
		
				$company_name = $_POST['CompanyName'];
				$check_company_name = check_name($company_name);
				
				$position_thai_name = $_POST['PositionThaiName'];
				$Position_Eng_Name = $_POST['PositionEngName'];
				
				$Place_name = $_POST['Placename'];
				$Quantity = $_POST['Quantity'];
				$Salaly = $_POST['Salaly'];
				$Placename = $_POST['Placename'];
				$Full = $_POST['Full'];
				$Part = $_POST['Part'];
				$date_start = $_POST['DateStart'];
				$date_end = $_POST['DateEnd'];
				$recomment = $_POST['Recomment']	
			
			 
			 /*
				$_SESSION['company_name'] = $_POST['CompanyName'];
				$_SESSION['position_thai_name'] = $_POST['PositionThaiName'];
				$_SESSION['Position_Eng_Name'] = $_POST['PositionEngName'];
				$_SESSION['Place_name'] = $_POST['Placename'];
				$_SESSION['Quantity'] = $_POST['Quantity'];
				$_SESSION['Salaly'] = $_POST['Salaly'];
				$_SESSION['Placename'] = $_POST['Placename'];
				$_SESSION['Full'] = $_POST['Full'];
				$_SESSION['Part'] = $_POST['Part'];
				$_SESSION['date_start'] = $_POST['DateStart'];
				$_SESSION['date_end'] = $_POST['DateEnd'];
				$_SESSION['recomment'] = $_POST['Recomment']
			*/	
		?>
		<form action=insert-job.php"">
			
			
		</form>
		<?php
			function check_company_and_place_name($name)
			{
				if(ereg("[[:space:]]",$name) || $name == "")
				{
					return FALSE;
				} 
				
				return TRUE;
			}
			
			function check_position_thai_name($name)
			{
				if(ereg("^[a-z][a-z0-9\_]",$name) || $name == "")
				{
					return FALSE;
				} 
				
				return TRUE;
			}
			
			function check_position_Eng_name($name)
			{
				if(ereg("^[a-z][a-z0-9\_]",$name) || $name != "")
				{
					return TRUE;
				} 
				
				return FALSE;
			}
			
			function check_quantity($name)
			{
				if(ereg("^[0-9]",$name) AND $name != "")
				{
					return TRUE;
				} 
				
				return FALSE;
			}
			
		?>
	</body>
</html>

