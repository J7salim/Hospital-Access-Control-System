<?php
	ob_start();
	session_start();
	$current_file = $_SERVER ['SCRIPT_NAME'];
	
	if (isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
	{
		$http_referer = $_SERVER['HTTP_REFERER'];
	}
	
	function loggedin()
	{
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		return true;
	}else
	{
		return false;
	}
	}
	
	function getuserfield($field)
	{
		$query = "SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
		if ($query_run = mysql_query($query))
		{
			if ($query_result = mysql_result($query_run, 0, $field))
			{
				return $query_result;
			}
		} 
	}
	
	function check()
	{
		$check = mysql_query("SELECT admin, staff, doctor FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{
			$admin = $row['admin'];
			$staff = $row['staff'];
			$doctor = $row['doctor'];
			
			if ($admin == 1)
			{
				return true;
			}
				elseif ($staff == 1)
				{
					return true;
				}
				elseif ($doctor == 1)
				{
					return true;
				}
			else
			{
				return false;
			}		
		}
	}
	
		function checkadmission()
	{
		$check = mysql_query("SELECT admission FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$admission = $row['admission'];
			
			if ($admission == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function checkbill()
	{
		$check = mysql_query("SELECT bill FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$bill = $row['bill'];
			
			if ($bill == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function checkmedical()
	{
		$check = mysql_query("SELECT medical FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$medical = $row['medical'];
			
			if ($medical == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function checkstocks()
	{
		$check = mysql_query("SELECT stocks FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$stocks = $row['stocks'];
			
			if ($stocks == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function checkpatient()
	{
		$check = mysql_query("SELECT patient FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$patient = $row['patient'];
			
			if ($patient == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function checkadmin()
	{
		$check = mysql_query("SELECT admin FROM access WHERE userid = '".$_SESSION['user_id']."'");
		
		while ($row = mysql_fetch_array($check))
		{

			$admin = $row['admin'];
			
			if ($admin == 1)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function staff()
	{
		$myData = mysql_query("SELECT * FROM users");
		while ($record = mysql_fetch_array($myData))
		{
			$username = $record['username'];
			$username_decrypted = base64_decode($username);
			
			echo '<option value="' . $record['id'] . '">' . $username_decrypted . '</option>';
		}
	}
	
	function username()
	{
		$myData = mysql_query("SELECT * FROM users");
		while ($record = mysql_fetch_array($myData))
		{
			
			$username = $record['username'];
			$username_decrypted = base64_decode($username);
			
			echo '<option value="' . $record['id'] . '">' . $username_decrypted . '</option>';
		}
	}
	
	function stocklevel()
	{
		$check = mysql_query("SELECT quantity FROM stocks ");
		
		while ($row = mysql_fetch_array($check))
		{

			$quantity = $rows['quantity'];
			$quantity_decrypted = base64_decode($quantity);
			
			if ($quantity_decrypted >= 30)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
	}
	
	function stock()
	{
		$myData = mysql_query("SELECT * FROM stocks");
		while ($record = mysql_fetch_array($myData))
		{
			
			$drugname = $record['drugname'];
			$drugname_decrypted = base64_decode($drugname);
			
			echo '<option value="' . $record['id'] . '">' . $drugname_decrypted . '</option>';
		}
	}
	
		
	/*function doctorincharge()
	{
		$myData = mysql_query("SELECT * FROM access");
		while ($record = mysql_fetch_array($myData))
		{
			
			$drugname = $record['drugname'];
			$drugname_decrypted = base64_decode($drugname);
			
			echo '<option value="' . $record['id'] . '">' . $drugname_decrypted . '</option>';
		}
	}*/
?>
