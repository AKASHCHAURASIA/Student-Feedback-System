<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['admin'];
$msg = "";
$flag="1";
include 'config/config.php';
if ($log != "log"){
	header ("Location: index.php");
}

$conn = db();
if(isset($_POST['add'])){
    $q_type = $_POST['q_type'];
    switch($q_type){
        case '1':
            $q = 'Planning and organisation';
            break;
        case '2':
            $q = 'Presentation/Communication';
            break;
        case '3':
            $q = 'Student Participation';
            break;
        case '4':
            $q = 'Class Management/Assessment of students';
            break;
    }
	$que = $_POST['que'];
	$sql = mysqli_query($conn, "INSERT INTO ques(question, q_batch) VALUES('$que', '$q_type')");
	$sql1 =mysqli_query($conn, "SELECT * from ques WHERE question='$que'");
	while ($db_field = mysqli_fetch_assoc($sql1))
	{$a = $db_field['q_id'];}
	
	$sql1 = mysqli_query($conn, "ALTER TABLE `cm_feed` ADD  `$a`   INT(1) NOT NULL;");
	/*$sql2 = mysqli_query($conn, "ALTER TABLE `if_feed` ADD Column `$a`   INT(1) NOT NULL;");
	$sql3 = mysqli_query($conn, "ALTER TABLE `ee_feed` ADD `$a` INT(10) NOT NULL;");
	$sql4 = mysqli_query($conn, "ALTER TABLE `ec_feed` ADD `$a` INT(10) NOT NULL;");
	$sql5 = mysqli_query($conn, "ALTER TABLE `me_feed` ADD `$a` INT(10) NOT NULL;");
	$sql6 = mysqli_query($conn, "ALTER TABLE `mh_feed` ADD `$a` INT(10) NOT NULL;");
	$sql7 = mysqli_query($conn, "ALTER TABLE `c_feed` ADD `$a` INT(10) NOT NULL;");
	$sql8 = mysqli_query($conn, "ALTER TABLE `cv_feed` ADD `$a` INT(10) NOT NULL;");*/
	
	if($sql && $sql1)
	{
		$msg = "Added";
        header('Location: question.php');
	}
	else {
		$msg = "unable";
        header('Location: question.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>

    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <style>
        td{
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
            padding-left: 15px;
        }
        textarea{
            resize: none;
            width: 100%;
            font-size: 15px;
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
                        <a href="analyzefeedback.php"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="createfeedback.php"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Feedback <span ></span></a>
                    </li>
                    <li class="selected">
                        <a href="question.php"><i class="fa fa-pencil fa-fw"></i> Update feedback questions</a>
                    </li>
                    <li>
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
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Update Feedback Questions</h1>
                </div>
                
                <!--End Page Header -->
            </div>
            <form action="question.php" method="POST">
				<textarea name="que" placeholder="Add a new question to the feedback form"  rows="3" class="txt_fld" required maxlength="900"></textarea><br>
                <?php
                    function question_type($conn){
                    $conn = db();
                    $q_type = $conn->query("SELECT * FROM q_type");
                    $i = 1;
                    ?>
                    <form>
                    <?php
                    while($db_field = mysqli_fetch_assoc($q_type))
                    {
                        ?>
                            <input type="radio" id="<?php echo $i;?>" name="q_type" value="<?php echo $i;?>"><label for="<?php echo $i;?>"><?php echo $db_field['q_type'];?></label><br>
                        <?php
                        $i++;
                    }
                }
                ?>
                <p style="font-size: 15px;">Select the category of question</p>
                <?php question_type($conn);?>
                <button name="add" class="stop" style="position: relative; left: 0px;">Add Question</button>
                </form>
                <?php print "$msg"; ?><br>
				 <table class="reference" style="width: 100%">
                     <tr style='border: 1px solid black'>
                         <th width="50px">No.</th>
                         <th>Questions</th>
                         <th width="100px">Action</th>
                     </tr>
                        <?php

                         $SQL = "SELECT * FROM ques";
                         $result = mysqli_query($conn, $SQL);
                         $i = 1;
                         $j = 0;
                         while ($db_field = mysqli_fetch_assoc($result))
                         {
                             $a = $db_field['q_id'];
                             $b = $db_field['question'];
                             print("<tr style='border: 1px solid black'><td align = 'center'><b>$i.<br></b></td>");
                             print("<td style='padding-left: 15px;'>$b</td>");
                             $j = $i + 1;
                             print("<td align = 'center'><a href = 'delete.php?key=".$a."&que=".$b."'><span style='position: relative; right: 15%;'>Delete</span></a></tr>");
                             $i = $i + 1;
                         }

                        ?>
				</table>
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
