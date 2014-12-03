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
			
			echo '<br /><p style="color:white; font-size: 15px;">You\'re logged in,  '.$firstname.' . <a href="logout.php">Log out</a></p><br>' ;

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
				<li><a href="bill.php">Billing</a></li>
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
        <li><a href="#">User Management</a>
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
	<h1 class="title">Staff by categories</h1>
	<div class="line"></div>
	<?php echo $message; ?>
	<?php if (checkadmin()) { ?>	
	<div class="intro"></div>
	<!-- Form for registration -->
		<div id="container">
		<div id="main">
			<table>
				<tr>
					<th>Administrator</th>
					
				</tr>
				<!-- Test Template Features -->
				<?php
					$sql = "SELECT COUNT(DISTINCT `admin`) FROM access";
					$query =  mysql_query($sql) or die(mysql_error());
					
					while ($rows = mysql_fetch_assoc($query))
					{
				?>	
					<tr>
						<td><?php echo $rows['admin']; ?></td>

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