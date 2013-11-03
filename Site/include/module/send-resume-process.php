<?php
$rootpath = "./";
$rootadminpath = "./admin/";
include ("../../admin/include/connect-to-database.php");
@send_email();

function send_email(){
	$test_message = "";
	$user_id = $_REQUEST['user_id'];
	$job_id = $_REQUEST['job_id'];
	$sql="	SELECT CompanyName
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
				$phone_number	= $rs['phone_number'];	
			}
			
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
				while($rs=@mysql_fetch_array($result))
				{
					$education_level = $rs['education_level'];
					$Institution = $rs['Institution'];
					$year_start = $rs['year_start'];
					$year_end = $rs['year_end'];
				}			
				//experiences
				$sql="	SELECT *
				FROM buildthedot_thaijobhd_user_history_experiences
				WHERE user_account_id = '$user_id'	
				LIMIT 0,1				
				";
				$result=@mysql_query($sql);
				if($result)
				{	
					$count = 0;
					while($rs=@mysql_fetch_array($result))
					{
						$job_position = $rs['job_position'];
						$company_name = $rs['company_name'];
						$year_start = $rs['year_start'];
						$year_end = $rs['year_end'];
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
						$count = 0;
						while($rs=@mysql_fetch_array($result))
						{
							$language= $rs['language'];
							$score_speaking = $rs['score_speaking'];
							$score_understandingyear_start = $rs['score_understanding'];
							$score_reading = $rs['score_reading'];
							$score_writing = $rs['score_writing'];
						}			
						
						//talent other
						$sql="	SELECT *
						FROM buildthedot_thaijobhd_user_history_talent_others
						WHERE user_account_id = '$user_id'				
						";
						$result=@mysql_query($sql);
						if($result)
						{	
							$count = 0;
							while($rs=@mysql_fetch_array($result))
							{
								$topic= $rs['topic'];
							}			
							echo"";
							
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