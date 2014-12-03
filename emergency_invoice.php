<?php
	require 'core.inc.php';
	require 'connect.inc.php' ;
	
	
	if (loggedin()) 
	{
?>
<?php
	if(isset($_POST['submit']))
	{
		$patientNumber = $_POST['patientNumber'];
		$doctorCharge = $_POST['doctorCharge'];
		$doctorCharge_encrypted = base64_encode($doctorCharge);
		$admissionCharge = $_POST['admissionCharge'];
		$admissionCharge_encrypted = base64_encode($admissionCharge);
		$specialCare = $_POST['specialCare'];
		$specialCare_encrypted = base64_encode($specialCare);
		$treatmentCategory = $_POST['treatmentCategory'];
		$treatmentCategory_encrypted = base64_encode($treatmentCategory);
		$serviceCharge = $_POST['serviceCharge'];
		$serviceCharge_encrypted = base64_encode($serviceCharge);
		$governmentTax = $_POST['governmentTax'];
		$governmentTax_encrypted = base64_encode($governmentTax);
		
		$query = "INSERT INTO `invoice` VALUES ('$patientNumber', '$doctorCharge_encrypted', '$admissionCharge_encrypted', '$specialCare_encrypted', '$treatmentCategory_encrypted', '$serviceCharge_encrypted', '$governmentTax_encrypted', NOW())";
		if ($results = mysql_query($query))
		{
			header('Location: ok.php');
		}else
		{
			header('Location: failed.php');
		}
	}
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
        <li><a href="index.php">Admissions</a>
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
        <li><a href="bill_receivable.php" class="active">Billing & Receivable</a>
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
        <li><a href="medical.php">Medical Records</a></li>
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
				<li><a href="view_stocks.php">View Stock</a></li>
				<li><a href="add_stocks.php">New Stock</a></li>
				<li><a href="update_stocks.php">Update Stock</a></li>
				<li><a href="delete_stocks.php">Delete Stock</a></li>
				
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
        <li><a href="#">User Management</a>
			<ul>
				<li><a href="patient.php">Patients</a></li>
				<?php if (check()) { ?>	
				<li><a href="staff.php">Staff</a></li>
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
	<h1 class="title">Registered Patient Profile</h1>
	<div class="line"></div>
	<?php echo $message; ?>
	<?php if (checkadmin()) { ?>	
	<div class="intro"></div>
	<!-- Form for registration -->
	<div id="container">
		<div id="main">
		<!-- Emergency Patient--->
		
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
				</tr>
				<!-- Test Template Features -->
				<?php
					$patientNumber = $_GET['id'];
					$sql = "SELECT * FROM emergency WHERE patientNumber='$patientNumber'";
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
					
						<td><a href="update.php?id=<?php echo $rows['id']; ?>">Update</a></td>
					</tr>
				<?php	
					
				?>
			</table>
						
		</div>
	</div>	
    <!-- End of the registration -->
	<!-- invoice -->
	<form class="jotform-form" action="emergency_invoice.php" method="post" name="form_32743415307450" id="32743415307450" accept-charset="utf-8">
	  <input type="hidden" name="formID" value="32743415307450" />
	  <div class="form-all">
		<ul class="form-section">
		  <li class="form-line" id="id_1">
			<label class="form-label-left" id="label_1" for="input_1">
			  Invoice Number<span class="form-required">*</span>
			</label>
			<div id="cid_1" class="form-input"><span class="form-sub-label-container"><input type="text" readonly="readonly" class="form-readonly  form-textbox validate[required]" data-type="input-textbox" id="input_1" name="patientNumber" size="20" value="<?php echo $patientNumber; } ?>" />
				<label class="form-sub-label" for="input_1"> Auto Generated Number </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_9">
			<label class="form-label-left" id="label_9" for="input_9">
			  Doctor Charge<span class="form-required">*</span>
			</label>
			<div id="cid_9" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_9" name="doctorCharge">
				  <option value="">  </option>
				  <option value="20"> Normal Service </option>
				  <option value="40"> Premium Service </option>
				  <option value="100"> VIP Service </option>
				</select>
				<label class="form-sub-label" for="input_9"> Select from the dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_4">
			<label class="form-label-left" id="label_4" for="input_4">
			  Admission Charge Per Night<span class="form-required">*</span>
			</label>
			<div id="cid_4" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_4" name="admissionCharge">
				  <option value="">  </option>
				  <option value="50"> Normal Service </option>
				  <option value="80"> Premium Service </option>
				  <option value="200"> VIP Service </option>
				</select>
				<label class="form-sub-label" for="input_4"> Select from the dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_5">
			<label class="form-label-left" id="label_5" for="input_5">
			  Special Care Charge<span class="form-required">*</span>
			</label>
			<div id="cid_5" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_5" name="specialCare">
				  <option value="">  </option>
				  <option value="30"> Normal Service </option>
				  <option value="50"> Premium Service </option>
				  <option value="100"> VIP Service </option>
				</select>
				<label class="form-sub-label" for="input_5"> Select from the dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_6">
			<label class="form-label-left" id="label_6" for="input_6">
			  Treatment Category<span class="form-required">*</span>
			</label>
			<div id="cid_6" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_6" name="treatmentCategory">
				  <option value="">  </option>
				  <option value="50"> Class A </option>
				  <option value="70"> Class B </option>
				  <option value="30"> Class Z </option>
				</select>
				<label class="form-sub-label" for="input_6"> Select from dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_7">
			<label class="form-label-left" id="label_7" for="input_7">
			  Service Charge<span class="form-required">*</span>
			</label>
			<div id="cid_7" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_7" name="serviceCharge">
				  <option value="">  </option>
				  <option value="20"> New Patient </option>
				  <option value="5"> Existing Patient </option>
				</select>
				<label class="form-sub-label" for="input_7"> Select from dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_8">
			<label class="form-label-left" id="label_8" for="input_8">
			  Government Tax<span class="form-required">*</span>
			</label>
			<div id="cid_8" class="form-input"><span class="form-sub-label-container"><select class="form-dropdown validate[required]" style="width:150px" id="input_8" name="governmentTax">
				  <option value="">  </option>
				  <option value="5"> Flat Rate </option>
				  <option value="0"> No Tax </option>
				</select>
				<label class="form-sub-label" for="input_8"> Select from the dropdown list </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_2">
			<div id="cid_2" class="form-input-wide">
			  <div style="margin-left:156px" class="form-buttons-wrapper">
				<button id="input_2" type="submit" name="submit" class="form-submit-button">
				  Submit
				</button>
				&nbsp;
				<button id="input_reset_2" type="reset" class="form-submit-reset">
				  Clear Form
				</button>
			  </div>
			</div>
		  </li>
		  <li style="display:none">
			Should be Empty:
			<input type="text" name="website" value="" />
		  </li>
		</ul>
	  </div>
	  <input type="hidden" id="simple_spc" name="simple_spc" value="32743415307450" />
	  <script type="text/javascript">
	  document.getElementById("si" + "mple" + "_spc").value = "32743415307450-32743415307450";
	  </script>
	</form>
	<!-- end invoice -->
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