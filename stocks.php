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
        <li><a href="stocks.php" class="active">Stocks</a>
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
	<h1 class="title">Hospital Stocks</h1>
	<div class="line"></div>
	<?php if (checkadmission()) { ?>	
	<div class="intro"></div>
	
	<!-- Begin Slider -->

    <!-- End Slider --> 

    <div class="one-half">
    <h3><a href="view_stocks.php"><img src="style/images/view_stocks.png" width="72" height="72" alt="" />View Stocks</a></h3>
    <p>View the current stocks levels.</p>
    </div>
    
    <div class="one-half last">
    <h3><a href="add_stocks.php"><img src="style/images/add_stocks.png"  width="72" height="72" alt="" />Add Stocks</a></h3>
    <p>Add or increase stock levels accordingly.</p>
    </div>
    
    <div class="clear"></div>
    
    
    
    <div class="one-half">
    <h3><a href="update_stocks.php"><img src="style/images/update_stocks.png"  width="72" height="72" alt="" />Update Stocks</a></h3>
    <p>Medical stocks can be updated at any given moments</p>
    </div>
    
    <div class="one-half last">
    <h3><a href="delete_stocks.php"><img src="style/images/delete_patient.png"  width="72" height="72" alt="" />Delete Stocks</a></h3>
    <p>Delete wrong inserted medical records or when expired date is reached</p>
    </div>
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