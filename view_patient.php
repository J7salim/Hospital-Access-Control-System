<?php
	require 'core.inc.php';
	require 'connect.inc.php' ;
	
	
	if (loggedin()) 
	{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Hospital Access Control System</title>
<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="style/js/carousel.js"></script>
<script type="text/javascript" src="style/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="style/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
<link type="text/css" rel="stylesheet" href="css/styles/form.css?v3.1.19"/>
<link href="css/calendarview.css?v3.1.19" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://cdn.jotfor.ms/css/styles/nova.css?3.1.19" />
<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.1.19" />
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:650px;
        color:#555 !important;
        font-family:'Lucida Grande';
        font-size:14px;
    }
	
#main table {
	
}

#main table th {
	padding: 10px;
	background-color: #48577D;
	color: #FFFFFF;
	text-align:	center;
	font-weight: bold;
}

#main table td {
	padding: 5px;
	text-align:	center;
}

#main table tr {
	background-color: #D3DCF2;
}	
</style>

<script src="js/prototype.js?v=3.1.19" type="text/javascript"></script>
<script src="js/json2.js?v=3.1.19" type="text/javascript"></script>
<script src="js/protoplus.js?v=3.1.19" type="text/javascript"></script>
<script src="js/protoplus-ui.js?v=3.1.19" type="text/javascript"></script>
<script src="js/jotform.js?v=3.1.19" type="text/javascript"></script>
<script src="js/calendarview.js?v=3.1.19" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init();
</script>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <div id="logo"><a href="index.php"><img src="style/images/logo.png" alt="Hospital Access Control System" /></a></div>
		<?php

			$firstname = getuserfield('firstname');
			$surname = getuserfield('surname');
			$firstname_decrypted = base64_decode($firstname);
			$surname_decrypted = base64_decode($surname);
			
			echo '<br /><p style="color:white; font-size: 15px;">You\'re logged in,  '.$firstname_decrypted.' . <a href="logout.php">Log out</a></p><br>' ;

		?> 
		 
	<!-- Begin Menu -->
    <div id="menu" class="menu-v">
      <ul>
		<?php if (checkadmission()) { ?>	
        <li><a href="index.php" >Admissions</a>
			<ul>
				<li><a href="emergency.php">Emergency</a></li>
				<li><a href="surgical.php">Surgical</a></li>
				<li><a href="observation.php">Observation</a></li>
				<li><a href="others.php">Others</a></li>
			</ul>
        </li>
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
		<?php if (checkbill()) { ?>	
        <li><a href="bill_receivable.php">Billing & Receivable</a>
			<ul>
				<li><a href="view_patient_bill.php">Billing</a></li>
				<li><a href="receivable.php">Receivable</a></li>
				<li><a href="bill_receivable_report.php">Reports</a>
					<ul>
						<li><a href="bill.php">Billing Reports</a></li>
						<li><a href="receivable.php">Receivable Reports</a></li>
					</ul>
				</li>
			</ul>
        </li>
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
		<?php if (checkmedical()) { ?>
        <li><a href="medical.php">Medical Records</a>
			<ul>
				<li><a href="update_medical.php">Update</a></li>
				<li><a href="medical_report.php">Reports</a></li>
			</ul>
        </li>
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
		<?php if (checkstocks()) { ?>
        <li><a href="stocks.php">Stocks</a>
			<ul>
				<li><a href="new_stock.php">New Stock</a></li>
				<li><a href="update_stock.php">Update Stock</a></li>
				<li><a href="delete_stock.php">Delete Stock</a></li>
				<li><a href="stock_report.php">Stock Report</a></li>
			</ul>
        </li>
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
		<?php if (checkpatient()) { ?>
        <li><a href="#" class="active">User Management</a>
			<ul>
				<li><a href="patient.php">Patients</a>
					<ul>
						<li><a href="update_patient.php">Update Patient</a></li>
						<li><a href="delete_patient.php">Delete Patient</a></li>
						<li><a href="patient_Report.php">Patient Report</a></li>
					</ul>
				</li>
				<?php if (check()) { ?>	
				<li><a href="staff.php">Staff</a>
					<ul>
						<li><a href="new_staff.php">New Staff</a></li>
						<li><a href="update_staff.php">Update Staff</a></li>
						<li><a href="delete_staff.php">Delete Staff</a></li>
						<li><a href="staff_report.php">Staff Report</a></li>
					</ul>
				</li>
				<?php 
					}else
					{
				?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
				<?php
					}
				?>	

			</ul>
		</li>
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
		<?php if (checkadmin()) { ?>
		
			<li><a href="access.php">User Access Level</a></li>
			<li><a href="access_update.php">User Access Level Update</a></li>
		
		<?php 
			}else
			{
		?>		<li><a href="#" style="color: red;"><?php echo 'Permission Denied'; ?></a></li>
		<?php
			}
		?>
      </ul>
    </div>
    <!-- End Menu -->
   
    
    <!--<div class="sidebox">
    <ul class="share">
    	<li><a href="#"><img src="style/images/icon-rss.png" alt="RSS" /></a></li>
    	<li><a href="#"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
    	<li><a href="#"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>
    	<li><a href="#"><img src="style/images/icon-dribbble.png" alt="Dribbble" /></a></li>
    	<li><a href="#"><img src="style/images/icon-linkedin.png" alt="LinkedIn" /></a></li>
    </ul>
    </div>-->

    
	</div>
	<!-- End Sidebar -->
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">All registered patients</h1>
	<div class="line"></div>
	<?php echo $message; ?>
	<?php if (checkadmin()) { ?>	
	<div class="intro"></div>
	<!-- Form for registration -->
	<div id="container">
		<div id="main">
		<!-- Emergency Patient--->
		<h2>Emergency Patients</h2>
			<table>
				<tr>
					<th>Patient Number</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Description</th>
					<th>Room Number</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<!-- Test Template Features -->
				<?php
					$sql = "SELECT * FROM emergency GROUP BY id ASC";
					$query =  mysql_query($sql) or die(mysql_error());
					
					while ($rows = mysql_fetch_assoc($query))
					{
						$patientNumber = $rows['patientNumber'];
						$patientFirst = $rows['patientFirst'];
						$patientLast = $rows['patientLast'];
						$gender = $rows['gender'];
						$birthDate = $rows['birthDate'];
						$description = $rows['description'];
						$emergencyRoom = $rows['emergencyRoom'];
						
						//$patientNumber_decrypted = base64_decode($patientNumber);
						$patientFirst_decrypted = base64_decode($patientFirst);
						$patientLast_decrypted = base64_decode($patientLast);
						$gender_decrypted = base64_decode($gender);
						$birthDate_decrypted = base64_decode($birthDate);
						$description_decrypted = base64_decode($description);
						$emergencyRoom_decrypted = base64_decode($emergencyRoom);

				?>	
					<tr>
						<td><?php echo $patientNumber; ?></td>
					
						<td><?php echo $patientFirst_decrypted; ?></td>
					
						<td><?php echo $patientLast_decrypted; ?></td>
						
						<td><?php echo $gender_decrypted; ?></td>
						
						<td><?php echo $birthDate_decrypted; ?></td>
						
						<td><?php echo $description_decrypted; ?></td>
						
						<td><?php echo $emergencyRoom_decrypted; ?></td>
					
						<td><a href="emergency_update_patient.php?id=<?php echo $rows['patientNumber']; ?>">Update</a></td>
						
						<td><a href="delete_patient.php">Delete</a></td>
					</tr>
				<?php	
					}
				?>
			</table>
			<!-- Surgical Patient -->
			<h2>Surgical Patients</h2>	
			<table>
				<tr>
					<th>Patient Number</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Description</th>
					<th>Room Number</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<!-- Test Template Features -->
				<?php
					$sql = "SELECT * FROM surgical GROUP BY id ASC";
					$query =  mysql_query($sql) or die(mysql_error());
					
					while ($rows = mysql_fetch_assoc($query))
					{
						$patientNumber = $rows['patientNumber'];
						$patientFirst = $rows['patientFirst'];
						$patientLast = $rows['patientLast'];
						$gender = $rows['gender'];
						$birthDate = $rows['birthDate'];
						$description = $rows['description'];
						$surgicalRoom = $rows['surgicalRoom'];
						
						//$patientNumber_decrypted = base64_decode($patientNumber);
						$patientFirst_decrypted = base64_decode($patientFirst);
						$patientLast_decrypted = base64_decode($patientLast);
						$gender_decrypted = base64_decode($gender);
						$birthDate_decrypted = base64_decode($birthDate);
						$description_decrypted = base64_decode($description);
						$surgicalRoom_decrypted = base64_decode($surgicalRoom);

				?>	
					<tr>
						<td><?php echo $patientNumber; ?></td>
					
						<td><?php echo $patientFirst_decrypted; ?></td>
					
						<td><?php echo $patientLast_decrypted; ?></td>
						
						<td><?php echo $gender_decrypted; ?></td>
						
						<td><?php echo $birthDate_decrypted; ?></td>
						
						<td><?php echo $description_decrypted; ?></td>
						
						<td><?php echo $surgicalRoom_decrypted; ?></td>
					
						<td><a href="surgical_update_patient.php?id=<?php echo $rows['patientNumber']; ?>">Update</a></td>
						
						<td><a href="delete_patient.php">Delete</a></td>
					</tr>
				<?php	
					}
				?>
			</table>
			<!-- Observation Patients -->
			<h2>Observation Patients</h2>
			<table>
				<tr>
					<th>Patient Number</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Description</th>
					<th>Room Number</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<!-- Test Template Features -->
				<?php
					$sql = "SELECT * FROM observation GROUP BY id ASC";
					$query =  mysql_query($sql) or die(mysql_error());
					
					while ($rows = mysql_fetch_assoc($query))
					{
						$patientNumber = $rows['patientNumber'];
						$patientFirst = $rows['patientFirst'];
						$patientLast = $rows['patientLast'];
						$gender = $rows['gender'];
						$birthDate = $rows['birthDate'];
						$description = $rows['description'];
						$observationRoom = $rows['observationRoom'];
						
						//$patientNumber_decrypted = base64_decode($patientNumber);
						$patientFirst_decrypted = base64_decode($patientFirst);
						$patientLast_decrypted = base64_decode($patientLast);
						$gender_decrypted = base64_decode($gender);
						$birthDate_decrypted = base64_decode($birthDate);
						$description_decrypted = base64_decode($description);
						$observationRoom_decrypted = base64_decode($observationRoom);

				?>	
					<tr>
						<td><?php echo $patientNumber; ?></td>
					
						<td><?php echo $patientFirst_decrypted; ?></td>
					
						<td><?php echo $patientLast_decrypted; ?></td>
						
						<td><?php echo $gender_decrypted; ?></td>
						
						<td><?php echo $birthDate_decrypted; ?></td>
						
						<td><?php echo $description_decrypted; ?></td>
						
						<td><?php echo $observationRoom_decrypted; ?></td>
					
						<td><a href="observation_update_patient.php?id=<?php echo $rows['patientNumber']; ?>">Update</a></td>
						
						<td><a href="delete_patient.php">Delete</a></td>
					</tr>
				<?php	
					}
				?>
			</table>
			<!-- Others Patients -->
			<h2>Unknown Patients</h2>
			<table>
				<tr>
					<th>Patient Number</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Description</th>
					<th>Room Number</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<!-- Test Template Features -->
				<?php
					$sql = "SELECT * FROM unknownpatient GROUP BY id ASC";
					$query =  mysql_query($sql) or die(mysql_error());
					
					while ($rows = mysql_fetch_assoc($query))
					{
						$patientNumber = $rows['patientNumber'];
						$patientFirst = $rows['patientFirst'];
						$patientLast = $rows['patientLast'];
						$gender = $rows['gender'];
						$birthDate = $rows['birthDate'];
						$description = $rows['description'];
						$Room = $rows['Room'];
						
						//$patientNumber_decrypted = base64_decode($patientNumber);
						$patientFirst_decrypted = base64_decode($patientFirst);
						$patientLast_decrypted = base64_decode($patientLast);
						$gender_decrypted = base64_decode($gender);
						$birthDate_decrypted = base64_decode($birthDate);
						$description_decrypted = base64_decode($description);
						$Room_decrypted = base64_decode($Room);

				?>	
					<tr>
						<td><?php echo $patientNumber; ?></td>
					
						<td><?php echo $patientFirst_decrypted; ?></td>
					
						<td><?php echo $patientLast_decrypted; ?></td>
						
						<td><?php echo $gender_decrypted; ?></td>
						
						<td><?php echo $birthDate_decrypted; ?></td>
						
						<td><?php echo $description_decrypted; ?></td>
						
						<td><?php echo $Room_decrypted; ?></td>
					
						<td><a href="others_update_patient.php?id=<?php echo $rows['patientNumber']; ?>">Update</a></td>
						
						<td><a href="delete_patient.php">Delete</a></td>
					</tr>
				<?php	
					}
				?>
			</table>
		</div>
	</div>	
    <!-- End of the registration -->
	<?php 
		}else
		{
	?>		<center><h2 style="color: red;">Permission Denied</h2></center>
	<?php
		}
	?>
</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
<?php
		
	}else
	{
		require 'loginform.inc.php';
	}

?>