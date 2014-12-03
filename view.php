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
<style type="text/css">
#container{
   width:800px;
   margin:10% 30%;
}

p{
	list-style-type: none;
	border-bottom: dotted 1px black;
	height: 50px;
	text-decoration: none;
	font-size: 18px;
	
}

p:hover{
	background: #A592E8;
}
</style>
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
        <li><a href="index.php" >Admissions</a>
			<ul>
				<li><a href="emergency.php">Emergency</a></li>
				<li><a href="surgical.php">Surgical</a></li>
				<li><a href="observation.php">Observation</a></li>
				<li><a href="others.php">Others</a></li>
			</ul>
        </li>
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
        <li><a href="medical.php">Medical Records</a>
			<ul>
				<li><a href="update_medical.php">Update</a></li>
				<li><a href="medical_report.php">Reports</a></li>
			</ul>
        </li>
        <li><a href="stocks.php">Stocks</a>
			<ul>
				<li><a href="new_stock.php">New Stock</a></li>
				<li><a href="update_stock.php">Update Stock</a></li>
				<li><a href="delete_stock.php">Delete Stock</a></li>
				<li><a href="stock_report.php">Stock Report</a></li>
			</ul>
        </li>
        <li><a href="user.php">User Management</a>
			<ul>
				<li><a href="patient.php">Patients</a>
					<ul>
						<li><a href="update_patient.php">Update Patient</a></li>
						<li><a href="delete_patient.php">Delete Patient</a></li>
						<li><a href="patient_Report.php">Patient Report</a></li>
					</ul>
				</li>	
				<li><a href="staff.php">Staff</a>
					<ul>
						<li><a href="new_staff.php">New Staff</a></li>
						<li><a href="update_staff.php">Update Staff</a></li>
						<li><a href="delete_staff.php">Delete Staff</a></li>
						<li><a href="staff_report.php">Staff Report</a></li>
					</ul>
				</li>	

			</ul>
		</li>
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
		<div id="container">
	<h2>Search Patients</h2>
        <form action="view.php" method="get">
        	<input type="text" name="k" size="50" value="<?php echo $_GET['k']; ?>" />
            <input type="submit" value="Search" >
        </form>
		<br />
        <hr />
        
        <?php
			$k = $_GET['k'];
			
			$terms = explode (" ", $k);
			
			$query = "SELECT * FROM search WHERE ";
			
			foreach ($terms as $each)
			{
				$i++;
				if ($i == 1)
					$query .= "keywords LIKE '%$each%' ";
				else
					$query .= "OR keywords LIKE '%$each%' ";
			}
			
			// Connection
			mysql_connect("localhost", "root", "");
			mysql_select_db("searchengine");
			
			$query = mysql_query($query);
			$numrows = mysql_num_rows($query);
			if ($numrows > 0)
			{
				while ($row = mysql_fetch_assoc($query))
				{
					$id = $row['id'];
					$title = $row['title'];
					$description = $row['description'];
					$keywords = $row['keywords'];
					$link = $row['link'];
					
					echo 
						"<p>$description</br>
							<a href='$link'>$title</a>
						</p><br />";
				}
			}
			else
				echo "No results found for \"<b>$k</b>\"";
			
			//disconnect
			mysql_close();
		?>
		</div>
	<!-- Begin Search -->

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