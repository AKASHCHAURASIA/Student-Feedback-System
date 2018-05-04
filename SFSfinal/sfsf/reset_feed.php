<?php
require "config/config.php";
$msg="";
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['admin'];



if ($log != "log"){
	header ("Location: index.php");
}

$conn = db();

if(isset($_POST['yes']))
{
    $d = date('dMy');
    $e = "cm_feed".date('My');
         if(mysqli_query($conn, "CREATE TABLE `$e` SELECT * FROM cm_feed")){
            
            if(mysqli_query($conn, "UPDATE users SET chk='0' WHERE 1") && mysqli_query($conn, "TRUNCATE ee_feed")&& mysqli_query($conn, "TRUNCATE ec_feed")&& mysqli_query($conn, "TRUNCATE me_feed")&& mysqli_query($conn, "TRUNCATE cm_feed")&& mysqli_query($conn, "TRUNCATE if_feed") && mysqli_query($conn, "TRUNCATE c_feed")&& mysqli_query($conn, "TRUNCATE cv_feed")&& mysqli_query($conn, "TRUNCATE mh_feed")){
            if(mysqli_query($conn, "INSERT INTO previous_feed(f_date, branch, table_name) VALUES('$d', 'CM', '$e')")){   
			$msg="Feedback erased completely.";
		}
		else
		{
			$msg="Sorry unable to reset feedback, but the current feedback is saved for future reference.";
		}

}
    else{
        $msg="This Month's feedback has already been reset.";
    }
}
}
else if(isset($_POST['no']))
{
	echo "<script>location.assign('analyzefeedback.php')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>Reset Feedback | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <style>
        .list{
            margin-left: 0px;
        }
    </style>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side navhead" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse" >
                <!-- side-menu -->
                <ul class="nav" id="side-menu" style="background-color:#323232;">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="background-color: #323232">
                           
                            <div class="user-info" style="position: relative; left: 5%;">
                               <div>Administrator</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="analyzefeedback.php"><i class="fa fa-home fa-fw"></i> Home <span ></span></a>
                    </li>
                    <li>
                        <a href="createfeedback.php"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Feedback <span ></span></a>
                    </li>
                    <li>
                        <a href="question.php"><i class="fa fa-pencil fa-fw"></i> Update feedback questions</a>
                    </li>
                    <li>
                        <a href="delete_std.php"><i class="fa fa-trash-o fa-fw"></i> Delete a Student<span ></span></a>
                    </li>
                    <li class="selected">
                        <a href="reset_feed.php"><i class="fa fa-refresh fa-fw"></i> Reset Feedback<span ></span></a>
                    </li>
                    <li>
                        <a href="feedback_report.php"><i class="fa fa-clock-o fa-fw"></i> Previous Feedback Reports</a>
                    </li>
                    <li>
                        <a href="change-admin-pass.php"><i class="fa fa-key fa-fw"></i> Change Password</a>
                    </li>
                    <li class="logout-responsive" style="display: none;">
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
               
                <!--End Page Header -->
            </div>
            <div class="header">
            	<form action="logout.php" method="post">
            		<div style="height: 100%; position: absolute; right: 0px;">
            			<button type="submit" name="logout" style="background-color: #972217; height: 100%; color: white; outline: none; border: none; height: 59px; width: 100px;" class="btn bg-maroon btn-flat margin">Logout</button>
            		</div>
            	</form>
            </div><br>
            
            <section class="content-header">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Feedback Analysis</h1>
                </div>
                </section>
                <p style="font-size: 20px">Resetting feedback implies that feedback session has completed for this semester. Current feedback data will be saved and a fresh feedback can be conducted. Are you sure you want to continue?
                <form action="reset_feed.php" method="POST">
                    <input  type="submit" value="Yes" name="yes" class="stop">
                    <input type="submit" value="No" name="no" class="stop"><br><br><br>
                    <h3><?php if($msg==""){}else{ print "$msg";} ?></h3>
                </form>
            </p>
                <!--End Page Header -->
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
<?php
/*mysqli_query($conn, "SELECT * INTO if_feed1 FROM if_feed")&&
            mysqli_query($conn, "SELECT * INTO ee_feed1 FROM ee_feed")&&
            mysqli_query($conn, "SELECT * INTO ec_feed1 FROM ec_feed")&&
            mysqli_query($conn, "SELECT * INTO me_feed1 FROM me_feed")&&
            mysqli_query($conn, "SELECT * INTO mh_feed1 FROM mh_feed")&&
            mysqli_query($conn, "SELECT * INTO c_feed1 FROM c_feed")&&
            mysqli_query($conn, "SELECT * INTO cv_feed1 FROM cv_feed")*/
?>