<?php
	require 'connect.inc.php';
	
	$check = mysql_query("SELECT admin, staff, doctor FROM users");
	
	while ($row = mysql_fetch_array($check))
	{
		$admin = $row['admin'];
		$staff = $row['staff'];
		$doctor = $row['doctor'];
		
		if ($admin == 1)
		{
			echo 'Administrator';
		}
			elseif ($staff == 1)
			{
				echo 'Staff';
			}
			elseif ($doctor == 1)
			{
				echo 'Doctor';
			}
		else
		{
			echo 'No permission granted';
		}		
	}
?>