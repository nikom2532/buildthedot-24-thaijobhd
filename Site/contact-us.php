<?php
session_start();
$rootpath = "./";
$rootadminpath = "./admin/";
include ("include/header.php");
include ("admin/include/connect-to-database.php");
include ("include/top-menu.php");  
?>
<script type="text/javascript">

	function check_value_data()
	{
		var name = document.getElementById("name").value;
		if(name == "" || name == null)
		{
			alert("Name is not valid");
			return false;
		}
		
		var mail = document.getElementById("mail").value;
		if(mail == "" || mail == null)
		{
			alert("E-mail is not valid");
			return false;
		}
		
		var tel = document.getElementById("tel").value;
		if(tel == "" || tel == null)
		{
			alert("Telephone number is not valid");
			return false;
		}
		
		var text = document.getElementById("text3").value;
		if(text == "" || text == null)
		{
			alert("Text is not valid");
			return false;
		}
	}

</script>
	
<div id="content" class="container_12">
	<div id="content-profile">
		<div id="head-title">
			<h1>ติดต่อเรา</h1>
		</div>
		<div class="grid_7">
			<form id="contact-form" action="send-mail.php" name="send-email" method="post" onsubmit="return check_value_data()">
				<p class="grid_2">
					ชื่อ
				</p>
				<p class="grid_4">
					<input type="text" name ="name" id="name" class="round full-width" />
				</p>
				<br class="clear"/>
				<p class="grid_2">
					อีเมลล์
				</p>
				<p class="grid_4">
					<input type="text"  name="mail" id="mail" class="round full-width" />
				</p>
				<br class="clear"/>
				<p class="grid_2">
					เบอร์โทรศัพท์
				</p>
				<p class="grid_4">
					<input type="text" name="tel" id="tel" class="round full-width" />
				</p>
				<br class="clear"/>
				<p class="grid_2">
					เรื่องที่ติดต่อ
				</p>
				<p class="grid_4">
					<textarea type="text"  name="text" id="text3" class="round full-width" />
					</textarea>
				</p>
				<br class="clear"/>
				<p class="prefix_4">
					<!--- a href="#" class="contact-button black round">ลบข้อความ</a -->
					<input type="submit" class="contact-button blue round" value="ส่งข้อความ"/>
				</p>
				</form>
		</div>
		<div class="grid_4" id="address">
			<h2 class="text-blue">JobHD</h2>
			<p>
				299/99 ซอย สุทธิสารวินิจฉัย แขวงสามเสนนอก
				<br/>
				เขตห้วยขวาง กรุงเทพฯ 10310
				<br/>
				โทร. (622) 999 9999 / แฟกซ์  (622) 999 9999
			</p>
		</div>
	</div>
</div><!--end content -->
<?php
	include ("include/footer.php");
?>