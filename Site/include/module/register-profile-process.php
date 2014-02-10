<?php
@session_start();
$rootpath ="../../";
$rootadminpath ="../../admin/";
// include ($rootpath . "include/header.php");
include ($rootadminpath . "include/connect-to-database.php");
// include ($rootpath . "include/top-menu.php");

$email=$_POST["email"];
$passsword1=$_POST["passsword1"];
$passsword2=$_POST["passsword2"];
$birthdate=$_POST["birthdate"];
$place_of_birth=$_POST["place_of_birth"];
$age=$_POST["age"];
$nationality=$_POST["nationality"];
$religion=$_POST["religion"];
$height=$_POST["height"];
$weight=$_POST["weight"];
$blood=$_POST["blood"];
$lesion=$_POST["lesion"];
$current_address=$_POST["current_address"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$pouse_name=$_POST["pouse_name"];
$military_status=$_POST["military_status"];
$current_address_status=$_POST["current_address_status"];
$relationship_status=$_POST["relationship_status"];
$father_name=$_POST["father_name"];
$father_age=$_POST["father_age"];
$father_career=$_POST["father_career"];
$father_live_status=$_POST["father_live_status"];
$mother_name=$_POST["mother_name"];
$mother_age=$_POST["mother_age"];
$mother_career=$_POST["mother_career"];
$mother_live_status=$_POST["mother_live_status"];
$ref_name=$_POST["ref_name"];
$ref_relationship=$_POST["ref_relationship"];
$ref_workplace=$_POST["ref_workplace"];
$ref_position=$_POST["ref_position"];
$ref_phone_number=$_POST["ref_phone_number"];	

//create time now
$time_now = strtotime("now");

if($mail="" && $passsword1=="" && $passsword2==""){
	?><form id="register_profile_message_form" action="<?php echo $rootpath; ?>register.php" method="POST">
		<input type="hidden" id="register_profile_messaage" name="register_profile_messaage" value="forgot to enter E-mail and/or Passwords" />
	</form>
	<script>
		document.getElementById("register_profile_message_form").submit();
	</script><?php
}
elseif($passsword1!=$passsword2){
	?><form id="register_profile_message_form" action="<?php echo $rootpath; ?>register.php" method="POST">
		<input type="hidden" id="register_profile_messaage" name="register_profile_messaage" value="You type the password not to similar" />
	</form>
	<script>
		document.getElementById("register_profile_message_form").submit();
	</script><?php
}
else{
	$sql_user="
		SELECT * 
		FROM  `buildthedot_thaijobhd_user_account`
		WHERE `email` = '".$mail."' ;
	";
	$result_user = @mysql_query($sql_user);
	if($rs_user = @mysql_fetch_array($result_user)){
		?><form id="register_profile_message_form" action="<?php echo $rootpath; ?>register.php" method="POST">
			<input type="hidden" id="register_profile_messaage" name="register_profile_messaage" value="duplicate with our member E-mail" />
		</form>
		<script>
			document.getElementById("register_profile_message_form").submit();
		</script><?php
	}
	else{
		$email = htmlspecialchars(trim($email),ENT_QUOTES);
		$password_source = htmlspecialchars(trim($password1),ENT_QUOTES);
		$password = md5(sha1($password_source)).sha1(md5($password_source));
		unset($password_source);
		$sql_user_edit="
			INSERT INTO `buildthedot_thaijobhd_user_account` 
			(
				`email`, `password`, `birthdate`, `place_of_birth`, `age`, `nationality`, `religion`, `height`, `weight`, `blood`
				, `lesion`, `current_address`, `phone_number`, `pouse_name`, `military_status`
				, `current_address_status`, `relationship_status`, `father_name`, `father_age`, `father_career`
				, `father_live_status`, `mother_name`, `mother_age`, `mother_career`, `mother_live_status` 
			)
			VALUE
			(
			 '{$email}' ,
			 '{$password}',
				'{$birthdate}', '{$place_of_birth}', '{$age}', '{$nationality}', 
			'{$religion}' ,	'{$height}' ,	'{$weight}' ,	 '{$blood}' ,	 '{$lesion}' ,
			 '{$current_address}' ,	 '{$phone_number}' , '{$pouse_name}' , '{$military_status}' ,
			 '{$current_address_status}' , '{$relationship_status}' ,	 '{$father_name}' ,
			 '{$father_age}' ,
			 '{$father_career}' ,
			 '{$father_live_status}' ,
			 '{$mother_name}' ,
			 '{$mother_age}' ,
			 '{$mother_career}' ,
			 '{$mother_live_status}' 
			);
		";
		@mysql_query($sql_user_edit);
		$_SESSION["userid"] = mysql_insert_id();
		$sql_user_ref="
			SELECT * 
			FROM  `buildthedot_thaijobhd_user_account_reference_contacts` 
			WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
		";
		$result_user_ref=@mysql_query($sql_user_ref);
		if($rs_user_ref=@mysql_fetch_array($result_user_ref)) {
			$sql_user_ref_update="
				UPDATE `buildthedot_thaijobhd_user_account_reference_contacts` 
				SET
					`name` = '{$ref_name}' ,
					`relationship` = '{$ref_relationship}' ,
					`workplace` = '{$ref_workplace}' ,
					`position` = '{$ref_position}' ,
					`phone_number` = '{$ref_phone_number}' 
				WHERE `user_account_id` = '".$_SESSION["userid"]."' ;
			";
			@mysql_query($sql_user_ref_update);
		}
		else{
			$sql_user_ref_update="
				INSERT INTO `buildthedot_thaijobhd_user_account_reference_contacts` 
				(`user_account_id`, `name`, `relationship`, `workplace`, `position`, `phone_number`)
				VALUE
				('".$_SESSION["userid"]."', '{$ref_name}' , '{$ref_relationship}', '{$ref_workplace}', '{$ref_position}', '{$ref_phone_number}') ;
			";
			@mysql_query($sql_user_ref_update);
		}
		
		//For add the profile picture
		if(file_exists($_FILES['profile_picture']['tmp_name']) && is_uploaded_file($_FILES['profile_picture']['tmp_name'])){
			// echo $_FILES['profile_picture']['tmp_name'];
			include($rootpath."include/module/edit-profile-process2.php");
		}
		
		//For add the Resume file
		if(file_exists($_FILES['resume_file']['tmp_name']) && is_uploaded_file($_FILES['resume_file']['tmp_name'])){
			// echo $_FILES['profile_picture']['tmp_name'];
			include($rootpath."include/module/edit-profile-process3.php");
		}
		
		?><form id="register_profile_message_form" action="<?php echo $rootpath; ?>view-profile.php" method="POST">
			<input type="hidden" id="register_profile_messaage" name="register_profile_messaage" value="Register Success" />
		</form>
		<script>
			document.getElementById("register_profile_message_form").submit();
		</script> 
	<?php
	}
}
?>