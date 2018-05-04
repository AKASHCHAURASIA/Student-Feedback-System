<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['admin'];
$msg = "";
$flag="1";
include 'config/config.php';
$conn = db();
//login log check
if ($log != "log"){
	header ("Location: index.php");
}
    //sesion check
		$SQL = "SELECT * FROM users WHERE user='$user'";
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
			$db_user = $db_field['user'];
			$db_pass = $db_field['pass'];
			$db_year = $db_field['year'];
			$branch = $db_field['branch'];
			$batch = $db_field['batch'];
			$group = $db_field['u_group'];
            		
            switch($branch)	{
	            case "CM":
			
				$feed = "cm_feed";
				$sub_table = "time_table";
				break;
			
			    case "IF":
				$feed = "if_feed";
				$sub_table = "if_subject";break;
				case "EE":
				$feed = "ee_feed";
				$sub_table = "ee_subject";break;
				case "EC":
				$feed = "ec_feed";
				$sub_table = "ec_subject";break;
				case "ME":
				$feed = "me_feed";
				$sub_table = "me_subject";break;
				case "MH":
				$feed = "mh_feed";
				$sub_table = "mh_subject";break;
				case "C":
				$feed = "c_feed";
				$sub_table = "c_subject";break;
				case "CV":
				$feed = "cv_feed";
				$sub_table = "cv_subject";break;
			}
			$chk = $db_field['chk'];
			$uid = $db_field['u_id'];
		}

function userAdmin($conn){
    $conn = db();
    $res = mysqli_query($conn, "SELECT * FROM previous_feed ORDER BY t_id DSC");
    while ($db_field = mysqli_fetch_assoc($res))
		{
            echo $d = $db_field['f_date'];
            $df = $db_field['table_name'];
            $res1 = mysqli_query($conn, "SELECT * FROM `$df`");
            while ($field = mysqli_fetch_assoc($res1)){
                echo $field['u_id'];
            }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>Previous Feedback Reports | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    
    <style>
        #page-wrapper{
            background-color: white !important;
        }
        
        label{
            padding-right: 120px;
        }
    </style>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu" style="background-color:#323232;">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="background-color: #323232">
                           
                            <div class="user-info" style="position: relative; left: 5%;">
                               <div>ADMIN</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
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
                    <li>
                        <a href="reset_feed.php"><i class="fa fa-refresh fa-fw"></i> Reset Feedback<span ></span></a>
                    </li>
                    <li class="selected">
                        <a href="feedback_report.php"><i class="fa fa-clock-o fa-fw"></i> Previous Feedback Reports</a>
                    </li>
                    <li>
                        <a href="change-admin-pass.php"><i class="fa fa-key fa-fw"></i> Change Password</a>
                    </li>
                    <li class="logout-responsive" style="display: none;">
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                        <!--end user image section-->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="header">
            	<form action="logout.php" method="post">
            		<div style="height: 100%; position: absolute; right: 0px;">
            			<button type="submit" name="logout" style="background-color: #972217; height: 100%; color: white; outline: none; border: none; height: 59px; width: 100px;" class="btn bg-maroon btn-flat margin">Logout</button>
            		</div>
            	</form>
            </div><br>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Feedback Reports</h1>
                </div>
                <!--End Page Header -->
                <?php userAdmin($conn);?>
            </div>
        </div>
	</body>
</html>
