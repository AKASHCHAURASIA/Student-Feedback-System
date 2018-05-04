<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
//$batch = $_SESSION['batch'];
//$group = $_SESSION['group'];
$msg = "";
$flag="1";
require_once 'config/config.php';

//login log check
if ($log != "log"){
	header ("Location: index.php");
}

$t = $_SESSION['t'];
$sub = $_SESSION['s'];
        $SQL = "SELECT * FROM users WHERE user='".$_SESSION['user']."'";
        $conn = db();
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{   $id=$db_field['u_id'];
            $db_email = $db_field['email'];
            $db_group = $db_field['u_group'];
			$db_user = $db_field['user'];
			$db_pass = $db_field['pass'];
			$db_year = $db_field['year'];
			$branch = $db_field['branch'];
		    $batch = $db_field['batch'];
		$bac=$batch;
            $u_group = $db_field['u_group'];
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
             $SQL = "SELECT * FROM users WHERE user='$t'";
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
					//$ressub = mysqlii_query("SELECT * FROM `$sub_table` WHERE batch='$batch'") or die();
				//	while($db_field = mysqlii_fetch_assoc($ressub))
					{
						$teacher=$db_field['name'];
						
					}
        }
?>
<?php


function per($question,$teacher,$group,$year,$sub)
{
    $conn = db();
	$res = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE teacher_name='$teacher' AND year='$year' AND sub_code='$sub' ");
	$values = Array();
	$i = 0;
	$sum = $total = 0;
	while ($db_field = mysqli_fetch_assoc($res))
	{  
		$values[$i] = $db_field["$question"];
		$sum  = $sum + $values[$i];
		$total = $total + 5;
		$i++;
	}
	if($sum!=0)
	{
		return (intval(($sum/$total)*100));
	}
	else {
		return 0;
	}
}


$batch=explode('-',$batch);
$batch1=$batch[0];
 $batch2=$batch[1];

 if(date('y')==$batch2){
	   $sem=1;$year='FY';}
	   
else if(date('y')==$batch2+1)
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=2;$year="FY";}
   else {
	  
   $sem=3;$year="SY";}	 
 }
 else if(date('y')==($batch2+2))
 { if( date('m')>=01 && date('m')<=07)
	 {  $sem=4;$year='SY';}
	
   else{
   $sem=5;$year="TY";	 }
 }
 elseif(date('y')==$batch2+3)
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=6;$year="TY";}
   else {
	  
   $sem=7;$year="FRY";}	 
 }
else if(date('y')==$batch2+3){
	 
          $sem=8;$year='FRY';
		  
}	

$res = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE teacher_name='$teacher' AND year='$year'");
	$data = array();
	$i = 0;
	
$questions = array();
	
	while($db_field = mysqli_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}$i=0;
for($j=0;$j<count($questions);$j++)
{
	while ($db_field = mysqli_fetch_assoc($res))
	{  
		$data[$i] = $db_field["$question[$j]"];
		
        $i++;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>Feedback Result | SLIET Feedback System</title>
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
        #chart-container {
				width: 640px;
				height: auto;
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
                                 <div><span style='color:#18BC9C'>SLIET LONGOWAL</span><br><br><?php echo $user;?></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="index_std.php"> <i class="fa fa-home fa-fw"></i> Home</a>
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
                   <h1 class="page-header">View Result For <?php echo $teacher; ?></h1>
                </div>
                <!--End Page Header -->
            </div>

            <?php echo "$msg"; ?><br><br>
   <?php     $res = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$i=0;
	while($db_field = mysqli_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}

	
	$res1 = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE year='$year' AND teacher_name='$t'");
	$given = mysqli_num_rows($res1);
	if(mysqli_num_rows($res1) == 0)
	{
		$msg = "Sorry no one have given feedback yet.";
		echo "$msg";
	}
	else
	{
			$msg = "$given students have given feedback yet and results are according to that in Percentage.";
			print "<div id='print-content'>";
	echo "$msg<br><br><table border='2' style='width:55%''>";
	$i = $j = 0;
	$sum = 0;
	$total = array();
	$value = array();
	for($i=0;$i<1;$i++)
	{
		$sum = 0;
		$total[$i] = 0;
		for($j=0;$j<count($questions);$j++)
		{
			$value[$j][$i] = per($questions[$j],$t,$u_group,$year,$sub);
			$sum = $sum + $value[$j][$i];
		}
		$total[$i] = intval($sum/(count($questions)));
	}
  
	$re = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$i=0;
	while ($db_field = mysqli_fetch_assoc($re))
	{
		$questions[$i] = $db_field['question'];
		$j = $i + 1;
		$i++;
	}
        echo "<th>Subject</th>";
		echo "<th>Rating</th>";
	echo"</tr>";
	$sub_count = 1;
	$que_count = count($questions);
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$sub</td>";
	
	

	
	

	
	for($j=0;$j<=$que_count;$j++)
	{
		if($j != $que_count)
		{
			$e = $value[$j][$i];
			
		}
		else
		{
			$e = $total[$i];
			if($e==0)
			{
				print "<td>unavlaible</td>";
			}
			else if($e>1 && $e<=25){
				print "<td>Poor</td>";
			}
			else if($e<=50 && $e>25){
				print "<td>Satisfactory</td>";
			}
			else if($e<=70 && $e>50){
				print "<td>Good</td>";
			}
			else if($e>70 && $e<=85){
				print "<td>Very Good</td>";
			}
			else{
				print "<td>Excellent</td>";
		}
		}
	}
	print  "</tr>";
}
echo "</table></div><br><br>";


		
	
	}
        ?>
        
	
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
