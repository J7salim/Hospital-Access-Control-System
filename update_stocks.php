<?php
	require 'core.inc.php';
	require 'connect.inc.php' ;
	
	
	if (loggedin()) 
	{
?>
<?php
	if (isset($_POST['submit']))
	{
		$id = $_POST['id'];
		$batchid = mysql_real_escape_string($_POST['batchid']);
		$bactchid_hash = base64_encode($batchid);
		$drugname = mysql_real_escape_string($_POST['drugname']);
		$drugname_hash = base64_encode($drugname);
		$drugtype = mysql_real_escape_string($_POST['drugtype']);
		$drugtype_hash = base64_encode($drugtype);
		$quantity = mysql_real_escape_string($_POST['quantity']);
		$quantity_hash = base64_encode($quantity);
		$expired = $_POST['expired'];
		$expired_hash = base64_encode($expired);
		$price = $_POST['price'];
		$price_hash = base64_encode($price);
		
		$query = "UPDATE `stocks` SET `batchid`='$bactchid_hash',`drugname`='$drugname_hash',`drugtype`='$drugtype_hash',`quantity`='$quantity_hash',`expired`='$expired_hash',`price`='$price_hash' WHERE `id`= '$id'";
		if ($results = mysql_query($query))
		{
			$message = '<center><p style="color: green;">Stock Record Updated Successfully</p></center>';
		}else
		{
			$message = '<center><p style="color: red;">Failed to update stock</p></center>';
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
	<h1 class="title">Update Stock</h1>
	<div class="line"></div>
	<?php echo $message; ?>
	<?php if (checkadmin()) { ?>	
	<div class="intro"></div>
	<!-- Form for registration -->
<form class="jotform-form" action="update_stocks.php" method="post" name="form_32743415307450" id="32743415307450" accept-charset="utf-8">
	  <input type="hidden" name="formID" value="32743415307450" />
	  <div class="form-all">
		<ul class="form-section">
		<li class="form-line" id="">
			<label class="form-label-left" id="label_3" for="input_3"> Choose </label>
			<div id="cid_3" class="form-input">
			  <select class="form-dropdown" style="width:150px" id="input_3" name="id">
				<?php stock(); ?>
			  </select>
			</div>
		  </li>
		  <li class="form-line" id="id_1">
			<label class="form-label-left" id="label_1" for="input_1">
			  Batch ID<span class="form-required">*</span>
			</label>
			<div id="cid_1" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox"  id="input_1" name="batchid" size="20" value="" />
				<label class="form-sub-label" for="input_1">  </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_3">
			<label class="form-label-left" id="label_3" for="input_3">
			  Drug Name<span class="form-required">*</span>
			</label>
			<div id="cid_3" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_3" name="drugname" size="20" value="" />
				<label class="form-sub-label" for="input_3"> The full name of the drug </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_4">
			<label class="form-label-left" id="label_4" for="input_4">
			  Drug Type<span class="form-required">*</span>
			</label>
			<div id="cid_4" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_4" name="drugtype" size="20" value="" />
				<label class="form-sub-label" for="input_4"> For examole, anti-biotic </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_5">
			<label class="form-label-left" id="label_5" for="input_5">
			  Quantity<span class="form-required">*</span>
			</label>
			<div id="cid_5" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_5" name="quantity" size="20" value="" />
				<label class="form-sub-label" for="input_5"> The size of the batch. Ex 25 cartons </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_5">
			<label class="form-label-left" id="label_5" for="input_5">
			  Expired Date<span class="form-required">*</span>
			</label>
			<div id="cid_5" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_5" name="expired" size="20" value="" />
				<label class="form-sub-label" for="input_5"> Expired date. Ex DD/MM/YYYY </label></span>
			</div>
		  </li>
		  <li class="form-line" id="id_6">
			<label class="form-label-left" id="label_6" for="input_6">
			  Price per unit<span class="form-required">*</span>
			</label>
			<div id="cid_6" class="form-input"><span class="form-sub-label-container"><input type="text" class=" form-textbox validate[required]" data-type="input-textbox" id="input_6" name="price" size="20" value="" />
				<label class="form-sub-label" for="input_6"> RM 50@ </label></span>
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