<?php
$rootpath = "./";
$rootadminpath = "./admin/";
include ("../../admin/include/connect-to-database.php");
@send_email();

function send_email(){
	$text_subject = "";	
	$text_message = "";
	$user_id = $_REQUEST['user_id'];
	$job_id = $_REQUEST['job_id'];
	$sql="	SELECT *
			FROM  buildthedot_thaijobhd_job
			WHERE JobID = '$job_id'	
			LIMIT 0,1				
		";
	$result=@mysql_query($sql);
	if($result)
	{	
		$count = 0;
		while($rs=@mysql_fetch_array($result))
		{
			$Company = $rs['CompanyName'];
			$positionThai = $rs['PositionThai'];
			$positionEng = $rs['PositionEng'];
		}
		//$text_message = "ถึงผู้ดูแลระบบ <br><p> : " . $Company . " เธ•เธณเน�เธซเธ�เน�เธ�  : " . $positionThai . "(". $positionEng. ") </p><br>\n";
		//user	
		$text_message = "ถึงผู้ดูแลระบบ <br>		มีผู้ประสงคืจะสมัครงานกับบริษัท : " . $Company . "<br>		ตำแหน่ง  : " . $positionThai . "(". $positionEng. ") </p><br>\n";
		$sql="	SELECT *
			FROM  buildthedot_thaijobhd_user_account
			WHERE id = '$user_id'	
			LIMIT 0,1				
		";
		$result=@mysql_query($sql);
		if($result)
		{	
			$count = 0;
			while($rs=@mysql_fetch_array($result))
			{
				$email = $rs['email'];
				$firstname = $rs['firstname'];
				$midname = $rs['midname'];
				$lastname = $rs['lastname'];
				$birthdate = $rs['birthdate'];
				$nationality = $re['nationality'];
				$religion = $rs['religion'];
				$current_address = $rs['current_address'];
				$phone_number = $rs['phone_number'];	
			}
			$text_subject = "=?UTF-8?B?" . base64_encode($firstname . " " . $midname . " " . $lastname . ' สมัครงาน บริษัท : ' . $Company . "ตำแหน่ง  :" . $positionThai . "(". $positionEng. ")")."?="; ;		
			$text_message .= "ประวัติส่วนตัว  <br>	ชื่อจริง : " . $firstname . "<br>		ชื่อกลาง : " . $midname . "<br>		นามสกุล :  " . $lastname . "<br>";	
			$text_message .= "	วันเกิด   : " . $birthdate . "<br>	เชื้อชาติ  : " . $nationality . "<br>	ศาสนา  : ". $religion . "<br>";
			$text_message .= "<p>	ที่อยู่ปัจจุบัน  : ". $current_address . "<br>		เบอติดต่อ : " . $phone_number . "<br>	e-mail : " . $email . "<br>";
			//education
			$sql="	SELECT *
			FROM buildthedot_thaijobhd_user_history_educations
			WHERE user_account_id = '$user_id'	
			LIMIT 0,1				
			";
			$result=@mysql_query($sql);
			if($result)
			{	
				$count = 0;
				$text_message .= "	ระดับการศึกษา <br>"; 
				while($rs=@mysql_fetch_array($result))
				{
					$education_level = $rs['education_level'];
					$Institution = $rs['Institution'];
					$year_start = $rs['year_start'];
					$year_end = $rs['year_end'];
					$text_message .= "		ระดับชั้น  : ". $education_level ." <br>		สถานศึกษา  : ". $Institution ."		ปีการศึกษา  : " .$year_start . " ถึง   " . $year_end . "<br>";
				}			
				//experiences
				$sql="	SELECT *
				FROM buildthedot_thaijobhd_user_history_experiences
				WHERE user_account_id = '$user_id'	
				LIMIT 0,1				
				";
				$result=@mysql_query($sql);
				if($result)
				{	$text_message .= "	ประวัติการทำงาน<br>";
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						$job_position = $rs['job_position'];
						$company_name = $rs['company_name'];
						$year_start = $rs['year_start'];
						$year_end = $rs['year_end'];
						$text_message .= "		บริษัท  : ". $company_name ."<br>		ตำแหน่ง  : ". $job_position ."<br>		ตั้งแต่  : " . $year_start . " ถึง  " . $year_end . "<br>";
					}			
					//talent_languages
					$sql="	SELECT *
					FROM buildthedot_thaijobhd_user_history_talent_languages
					WHERE user_account_id = '$user_id'	
					LIMIT 0,1				
					";
					$result=@mysql_query($sql);
					if($result)
					{
						$text_message .= "	ความสามารถทางภาษา<br>";
						$count = 0;
						while($rs=@mysql_fetch_array($result))
						{
							$language = $rs['language'];
							$score_speaking = $rs['score_speaking'];
							$score_understanding = $rs['score_understanding'];
							$score_reading = $rs['score_reading'];
							$score_writing = $rs['score_writing'];
							$text_message .= "	ภาษา  :". $language ."<br>";
							$text_message .= "		พูด : " . $score_speaking . "<br>";
							$text_message .= "		ฟัง : " . $score_understanding  . "<br>";
							$text_message .= "		อ่าน : " . $score_reading . "<br>";
							$text_message .= "		เขียน : " . $score_writing . "<br>";
						}			
						
						//talent other
						$sql="	SELECT *
						FROM buildthedot_thaijobhd_user_history_talent_others
						WHERE user_account_id = '$user_id'				
						";
						$result=@mysql_query($sql);
						if($result)
						{
							$text_message .= "	ความสามารถพิเศษ<br>";	
							$count = 0;
							while($rs=@mysql_fetch_array($result))
							{
								$topic = $rs['topic'];
								$text_message .= "		-" .  $topic ."<br>";
							}			
							
							$subject = $text_subject;
							$to = "team@buildthedot.com";
							$message = $text_message;
							$from = "ThaiJobHD";
							$headers = "MIME-Version: 1.0' . \r\n";
							$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
						
							$send_mail = mail($to,$subject,$message,$headers);
							if($send_mail)
							{
								echo TRUE;
							}
							else {
								echo FALSE;
							}
						}
						else {
							echo FALSE;
						}
							
					}
					else {
						echo FALSE;
					}
						
				}
				else {
					echo FALSE;
				}	
				
			}
			else {
				echo FALSE;
			}	
			
			
		}
		else {
			echo FALSE;
		}
			
	}
	else {
		echo FALSE;
	}
}
?>