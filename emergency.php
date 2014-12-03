<?php
	require 'core.inc.php';
	require 'connect.inc.php' ;
	
	
	if (loggedin()) 
	{
?>
<?php
	
	if (isset($_POST['submit']))
	{
		$patientNumber = mysql_real_escape_string($_POST['patientNumber']);
		//$patientNumber_hash = base64_encode($patientNumber);
		$patientFirst = mysql_real_escape_string($_POST['patientFirst']);
		$patientFirst_hash = base64_encode($patientFirst);
		$patientLast = mysql_real_escape_string($_POST['patientLast']);
		$patientLast_hash = base64_encode($patientLast);
		$gender = mysql_real_escape_string($_POST['gender']);
		$gender_hash = base64_encode($gender);
		$birthDate = mysql_real_escape_string($_POST['birthDate']);
		$birthDate_hash = base64_encode($birthDate);
		$description = mysql_real_escape_string($_POST['description']);
		$description_hash = base64_encode($description);
		$emergencyRoom = mysql_real_escape_string($_POST['emergencyRoom']);
		$emergencyRoom_hash = base64_encode($emergencyRoom);
		
		$emer = "INSERT INTO emergency VALUES ('', '$patientNumber', '$patientFirst_hash', '$patientLast_hash', '$gender_hash', '$birthDate_hash', '$description_hash', '$emergencyRoom_hash')";
		if (mysql_query($emer))
		{
			header('Location: success.php');
		}else
		{
			$message = '<center><p style="color: red;">Failed to register the patient</p></center>';
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
<!-- Form style start here -->
<link type="text/css" rel="stylesheet" href="css/styles/form.css?v3.1.1583"/>
<link href="css/calendarview.css?v3.1.1583" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://cdn.jotfor.ms/css/styles/nova.css?3.1.1583" />
<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.1.1583" />
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
</style>

<script src="js/prototype.js?v=3.1.1583" type="text/javascript"></script>
<script src="js/json2.js?v=3.1.1583" type="text/javascript"></script>
<script src="js/protoplus.js?v=3.1.1583" type="text/javascript"></script>
<script src="js/protoplus-ui.js?v=3.1.1583" type="text/javascript"></script>
<script src="js/jotform.js?v=3.1.1583" type="text/javascript"></script>
<script src="js/calendarview.js?v=3.1.1583" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      JotForm.setCustomHint( 'input_5', 'The patient had an accident and is extremely in poor conditions' );
   });
</script>
<!-- ends here -->
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
        <li><a href="index.php" class="active">Admissions</a>
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
	<h1 class="title">Emergency Registration Form</h1>
	<div class="line"></div>
	<div class="intro">This is only for emergency patient only.</div>
	<center><p><?php echo $message; ?></p></center>
	
	<!-- Begin Slider -->

    <!-- End Slider --> 
	<!-- Form start here -->
	<form class="jotform-form" action="emergency.php" method="post" name="form_32638191299464" id="32638191299464" accept-charset="utf-8">
	  <input type="hidden" name="formID" value="32638191299464" />
	  <div class="form-all">
		<ul class="form-section">
		  <li class="form-line" id="id_8">
			<label class="form-label-left" id="label_8" for="input_8">
			  Patient Number<span class="form-required">*</span>
			</label>
			<div id="cid_8" class="form-input"><span class="form-sub-label-container"><input type="text" readonly="readonly" class="form-readonly  form-textbox validate[required]" data-type="input-textbox" id="input_8" name="patientNumber" size="20" value="<?php $string = rand(); echo $string; ?>" />
				<label class="form-sub-label" for="input_8"> Auto Generated Medical Record Number </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_1">
			<label class="form-label-left" id="label_1" for="input_1">
			  Patient First Name<span class="form-required">*</span>
			</label>
			<div id="cid_1" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_1" name="patientFirst" size="20" value="" />
				<label class="form-sub-label" for="input_1"> Example. Jumaa </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_3">
			<label class="form-label-left" id="label_3" for="input_3">
			  Patient Last Name<span class="form-required">*</span>
			</label>
			<div id="cid_3" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_3" name="patientLast" size="20" value="" />
				<label class="form-sub-label" for="input_3"> Example. Salim </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_7">
			<label class="form-label-left" id="label_7" for="input_7">
			  Gender<span class="form-required">*</span>
			</label>
			<div id="cid_7" class="form-input">
			  <select class="form-dropdown validate[required]" style="width:150px" id="input_7" name="gender">
				<option value="">  </option>
				<option value="Male"> Male </option>
				<option value="Female"> Female </option>
				
			  </select>
			</div>
		  </li>
		  <li class="form-line" id="id_3">
			<label class="form-label-left" id="label_3" for="input_3">
			  Birth Date<span class="form-required">*</span>
			</label>
			<div id="cid_3" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_3" name="birthDate" size="20" value="" />
				<label class="form-sub-label" for="input_3"> Example. DD/MM/YYYY </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_5">
			<label class="form-label-left" id="label_5" for="input_5">
			  Description<span class="form-required">*</span>
			</label>
			<div id="cid_5" class="form-input">
			  <textarea id="input_5" class="form-textarea validate[required]" name="description" cols="40" rows="6"></textarea>
			</div>
		  </li>
		  <li class="form-line" id="id_6">
			<label class="form-label-left" id="label_6" for="input_6">
			  Emergency Room<span class="form-required">*</span>
			</label>
			<div id="cid_6" class="form-input">
			  <select class="form-dropdown validate[required]" style="width:150px" id="input_6" name="emergencyRoom">
				<option value="">  </option>
				<option value="Room 1"> Room 1 </option>
				<option value="Room 2"> Room 2 </option>
				<option value="Room 3"> Room 3 </option>
			  </select>
			</div>
		  </li>
		  <li class="form-line" id="id_2">
			<div id="cid_2" class="form-input-wide">
			  <div style="margin-left:156px" class="form-buttons-wrapper">
				<button id="input_2" type="submit" name="submit" class="form-submit-button">
				  Register
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
	  <input type="hidden" id="simple_spc" name="simple_spc" value="32638191299464" />
	  <script type="text/javascript">
	  document.getElementById("si" + "mple" + "_spc").value = "32638191299464-32638191299464";
	  </script>
	</form>	
	<!-- ends here -->
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