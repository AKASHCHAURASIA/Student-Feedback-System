<?php
session_start();
$user = $_SESSION['user'];
$msg="";
$sem=$_SESSION['sem'];
$group=$_SESSION['g'];
$teacher=$_SESSION['teacher_name'];
$branch="CM";
$sub=$_SESSION['sub_code'];
require "config/config.php";
$conn = db();
$log = $_SESSION['teacher'];
if($_SESSION['teacher'] != "log")
{
		header("Location: index.php");
		
}
$batch=$_SESSION['year'];
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
$branch="CM";
 function per($question,$teacher,$group,$year,$sub)
{
    $conn = db();
	$res = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE teacher_name='$teacher' AND year='$year' AND sec='$group' AND sub_code='$sub' ");
	$values = array();
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


	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer science</title>

    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper" >
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
                               <div>Teacher</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="teacher-cm.php"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-clock-o fa-fw"></i> Previous Feedback Reports</a>
                    </li>
					<li>
                        <a href="teacher-cm-changepass.php"><i class="fa fa-key fa-fw"></i> Change Password</a>
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
            			<button type="submit" name="logout" class="btn bg-maroon btn-flat margin logout">Logout</button>
            		</div>
            	</form>
            </div><br>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Analze Your Feedbacks</h1>
                </div>

                <div class="col-lg-12">
			         <h1 class="page-header" style="font-size: 18px;"><?php echo $_SESSION['year']." (".$group.")";?>&nbsp;Feedback for&nbsp;<?php echo $_SESSION['teacher_name'];?> </h1>
                </div>   
                <span style="position: relative; left: 20px;"><?php echo "$msg"; ?><br><br>
			
			
		<?php echo "$msg"; ?><br><br>
				
               <?php 
	
	

		
	$res = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$i=0;
	while($db_field = mysqli_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}
                    print_r($questions);
	
	$res1 = mysqli_query($conn, "SELECT * FROM users WHERE year='$year' AND chk='1' AND branch='$branch'");
	$given = mysqli_num_rows($res1);
	if(mysqli_num_rows($res1) == 0)
	{
		$msg = "Sorry no one have given feedback yet.";
		echo "$msg";
	}
	else
	{
			$msg = "$given student(s) have given feedback yet and results are according to that in Percentage.";
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
			$value[$j][$i] = per($questions[$j],$teacher,$group,$year,$sub);
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
			echo $e;
			if($e<=25){
				print "<td>Poor</td>";
			}
			else if($e<=50 && $e>25){
				print "<td>Satisfactory</td>";
			}
			else if($e<=75 && $e>50){
				print "<td>Good</td>";
			}
			else{
				print "<td>Excellent</td>";
			}
		}
	}
	print  "</tr>";
}
echo "</table></div><br><br></span>";


		
	
	}
				?>
		
		
	
				
               
               

                <!--End Page Header -->
            </div>
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
