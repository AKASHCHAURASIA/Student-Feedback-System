<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
$batch = $_SESSION['batch'];
$group = $_SESSION['group'];
$msg = "";
$msg1='';
$flag="1";
require_once 'config/config.php';


//login log check
if ($log != "log"){
	header ("Location: index.php");
}
$SQL = "SELECT * FROM users WHERE user='".$_SESSION['user']."'";
        $conn = db();
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
            $chk = $db_field['chk'];
            $u_id = $db_field['u_id'];
        }

if(isset($_POST['view_result'])){
    $_SESSION['t'] = $_POST['teacher'];
    $_SESSION['s'] = $_POST['subject'];
    header('Location: result_std.php');
}
        $SQL = "SELECT * FROM users WHERE user='".$_SESSION['user']."'";
        $conn = db();
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
            $db_email = $db_field['email'];
            $db_group = $db_field['u_group'];
			$db_user = $db_field['user'];
			$db_pass = $db_field['pass'];
			$db_year = $db_field['year'];
			$branch = $db_field['branch'];
            $group = $db_field['u_group'];
            if($db_email === '' || $db_group === '' || $branch === ''){
                header('Location: index_redirect.php');
            }else{
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
    }    $teacher=array();
		  $i = 0;
        $conn = db();
			 $SQL1 = "SELECT * FROM time_table WHERE batch='$batch' ";
				 $result = mysqli_query($conn, $SQL1);
				while ($db_field = mysqli_fetch_assoc($result))
				{   $subject[$i]=$db_field['sub_code'];
			       $p=$db_field['P'];
				  $code1=$db_field['A1'];
				   $code2=$db_field['A2'];
				   $code3=$db_field['B1'];
				    $code4=$db_field['B2'];
				     $code5=$db_field['C1'];
					  $code6=$db_field['C2'];
				   $code7=$db_field['D1'];
				    $code8=$db_field['D2'];
                 if($group=='A' && $p>0)
                 { $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2') AND branch='$branch' ";}
                 else  if($group=='B' && $p>0)
                 { $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2') AND branch='$branch' ";}
                     
				else	if($group=='A' || $group=='B' && $p==0)
                        
					{  $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2' OR  user='$code3' OR user='$code4') AND branch='$branch' ";}
				else if($group=='C' || $group=='D' && $p==0)
				{$SQL2 = "SELECT * FROM users WHERE (user='$code5' OR user='$code6' OR  user='$code7' OR user='$code8') AND branch='$branch' ";}
					 $result2 = mysqli_query($conn, $SQL2);
                   
					while ($db_field1 = mysqli_fetch_assoc($result2))
					{
					
				      $teacher[$i]= $db_field1['user'];
					  
					  $i++;
					  
				}
				
				}
         
				$teacher=array_unique($teacher);
				$teacher=array_values($teacher);

    function feedSubBox($teacher, $conn, $subject)
		{
        $conn = db();
            for($i=0;$i<count($teacher);$i++)
				{
                ?>
                    <li>
                        <div class='ch-item ch-img-1'>
                            
                            <div class='ch-info'>
                                <h3>Your Voice Matters</h3>
                                <form action='index_std.php' method='POST'>
                                    <input type='hidden' name='teacher' value='<?php echo $teacher[$i];?>'>
                                    <input type='hidden' name='subject' value='<?php echo $subject[$i];?>'>
                                    <button name='feed'>
                                        <span style="color: yellow">Fill in Feedback</span>
                                    </button>
                                </form>
                            </div>
                            <div class='box-title'><center><p style="font-size: 12px;"><?php echo $teacher[$i];?></p></center></div>
                        </div>
                   </li>
                <?php
                }
			}
    $subject=array_values($subject);
    function feedResultBox($teacher, $conn, $subject)
		{
        $conn = db();
            for($i=0;$i<count($teacher);$i++)
				{
                ?>
                    <li>
                        <div class='ch-item ch-img-1'>
                            
                            <div class='ch-info'>
                                <h3>Your Voice Matters</h3>
                                <form action='' method='POST'>
                                    <input type='hidden' name='teacher' value='<?php echo $teacher[$i];?>'>
                                    <input type='hidden' name='subject' value='<?php echo $subject[$i];?>'>
                                    <button name='view_result'>
                                        <span style="color: yellow">View Feedback Result</span>
                                    </button>
                                </form>
                            </div>
                            <div class='box-title'><center><p style="font-size: 12px;"><?php echo $teacher[$i];?></p></center></div>
                        </div>
                   </li>
                <?php
                }
			}

if(isset($_POST['feed'])){
    $_SESSION['t'] = $_POST['teacher'];
    $_SESSION['s'] = $_POST['subject'];
    $sql = "SELECT * FROM cm_feed WHERE u_id = '$u_id' AND teacher_name = '{$_POST['teacher']}'";
    
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) == 1){
       $msg1="You have already submitted this feedback!"; 
        
    }else{
    header('Location: feedback.php');
    }
}
    $sql2 = "SELECT * FROM cm_feed WHERE u_id = '$u_id'";
    $res2 = mysqli_query($conn, $sql2);
    if(count($teacher) == mysqli_num_rows($res2)){
        mysqli_query($conn, "UPDATE users SET chk='1' WHERE user='$user'");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>Student Home Page | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <style>
    .box-title{
    margin-top: 45%;
        z-index: 1000;
        }
        button{
            background-color: transparent;
            border: 0;
        }
    </style>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper" class="wrapper">
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="height: 140px; background-color: #333333; margin-bottom: -5px;">
                            
                            <div class="user-info">
                                <div><br><br><?php echo $user;?></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="index_std.php"> <i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="change_stud_pass.php"> <i class="fa fa-key fa-fw"></i> Change Password</a>
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
                   <h1 class="page-header">Home</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome <b><?php echo $user;?></b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

            <?php
                $SQL = "SELECT flag FROM users WHERE post = 'admin' ";
                $conn = db();
                $res = mysqli_query($conn, $SQL);
		        while($db_field = mysqli_fetch_assoc($res)){
                if($db_field['flag'] === '1'){
            ?>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Current Feedbacks</h1>
                </div>
                <span style="position: relative; left: 20px;"><?php echo $msg1; ?></span>
                <ul class="ch-grid">
                    
                   <?php 
                    
                    if($chk == 0){
                        feedSubBox($teacher, $conn, $subject);
                    }
                    else if($chk == 1){
                        feedResultBox($teacher, $conn, $subject);
                    }
                    ?> 
                </ul>
                
                <!--End Page Header -->
            </div>
            <?php
                } else{
                    echo "No feedback is scheduled currently";
                }
                }
            
           
            ?>
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
