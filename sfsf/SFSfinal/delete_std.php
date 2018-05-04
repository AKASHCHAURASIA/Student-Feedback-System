<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['admin'];
$msg="";
require "config/config.php";
$conn = db();
if ($log != "log"){
	header ("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>Delete a Student | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <style>
        .link{
            color: black;
            font-size: 16px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper" class="wrapper">
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse" >
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
                    <li>
                        <a href="analyzefeedback.php"><i class="fa fa-home fa-fw"></i> Home<span ></span></a>
                    </li>
                    <li>
                        <a href="createfeedback.php"><i class="fa fa-bar-chart-o fa-fw"></i> Create a Feedback <span ></span></a>
                    </li>
                    <li>
                        <a href="question.php"><i class="fa fa-pencil fa-fw"></i> Update feedback questions</a>
                    </li>
                    <li class="selected">
                        <a href="delete_std.php"><i class="fa fa-trash-o fa-fw"></i> Delete a Student<span ></span></a>
                    </li>
                    <li>
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
            <div class="row" style="margin-left: 5px;">
                <label><span style="font-size: 25px">Select a Department</span></label><br>
                <a class="link" href="del-stud.php?key=CM">Computer Science and Engineering</a><br>
                    <a class="link" href="del-stud.php?key=C">Chemical Engineering</a><br>
                    <a class="link" href="del-stud.php?key=CV">Civil Engineering</a><br>

                    <a class="link" href="del-stud.php?key=EC">Electronics and Communication Engineering</a><br>
                    <a class="link" href="del-stud.php?key=EE">Electrical And Intstrumentation Engineering</a><br>
                    <a class="link" href="del-stud.php?key=IF">Food Engineering And Technology</a><br>
                    <a class="link" href="del-stud.php?key=ME">Mechanical Engineering</a><br>
                    <a class="link" href="#">Mathematics</a><br>
                    <a class="link" href="#">Chemistry </a><br>
                    <a class="link" href="#">Physics</a><br>
                    <a class="link" href="del-stud.php?key=MH">Management And Humanities</a>
            </div>
        </div>
        
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    
    <?php


		$SQL = "SELECT * FROM users WHERE branch='$branch' AND user!='admin' AND user!='cmhod' AND user!='ifhod' AND  user!='eehod' AND user!='echod' AND user!='mehod'AND user!='mhhod'AND user!='chod'  ORDER BY user ASC ";
		$result = mysqli_query($conn, $SQL);
		$i = 1;
		$j = 0;
		while ($db_field = mysqli_fetch_assoc($result))
		{
			$user = $db_field['user'];
			print("<tr><td align='center'><b>$i</b></td>");
			print("<td align='center'>$user</td>");
			$j = $i + 1;
			//echo "<td align='center' width = '40px><form action='del-stud.php?key=$branch' method='POST'><input type='hidden' name='user' value=".$user."><input type='submit' name='submit' value='Delete'></form></tr>";
			$i = $i + 1;
		}
?>

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
