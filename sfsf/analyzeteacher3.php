<?php

session_start();
$user = $_SESSION['user'];
$msg="";
$sem=$_SESSION['sem'];
$group=$_SESSION['g'];
$group1=$_SESSION['g1'];
$teacher=$_SESSION['teacher_name'];




$branch="CM";
$sub=$_SESSION['sub_code'];
require "config/config.php";
$conn = db(); 
$res = mysqli_query($conn, "SELECT * FROM users WHERE user='$teacher' ");
	while ($db_field = mysqli_fetch_assoc($res))
	{  
	  $teach=$db_field['name'];
		
	}
$log = $_SESSION['teacher'];
if($_SESSION['teacher'] != "log")
{
		header ("Location: index.php");
		
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

if(isset($_POST['year'])){
	
		$_SESSION['teacher_name'] = $_POST['teacher_name'];
		$_SESSION['sub_code'] = $_POST['sub_code'];
		$_SESSION['year']=$_POST['year'];
		$batch1=$_POST['year'];
		$b="$batch1";
		$_SESSION['g']=$_POST['g'];
		$_SESSION['g1']=$_POST['g1'];
		$batch2=explode('-',$b);
		
		$batch=$batch2[1];
		if(date('y')==$batch){
	   $sem=1;$year='FY';}
	   
else if(date('y')==($batch+1))
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=2;$year="FY";}
   else {
	  
   $sem=3;$year="SY";}	 
 }
 else if(date('y')==($batch+2))
 { if( date('m')>=01 && date('m')<=07)
	 {  $sem=4;$year='SY';}
	
   else{
   $sem=5;$year="TY";	 }
 }
 elseif(date('y')==($batch+3))
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=6;$year="SY";}
   else {
	  
   $sem=7;$year="FRY";}	 
 }
else if(date('y')==($batch+3)){
	 
          $sem=8;$year='FRY';
}
$_SESSION['sem']=$sem;
		header ("Location: analyzeteacher2.php");
		
	}
$branch="CM";

 function per($question,$teacher,$group,$group1,$year,$sub)
{
    $conn = db();
	$res = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE teacher_name='$teacher' AND year='$year' AND( sec='$group' OR sec='$group1') AND sub_code='$sub' ");
    

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


	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analyze Feedback | SLIET Feedback System</title>

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
   <script>
    function s3()
   {   
   
	   var e = document.getElementById("kl4").value;


 if(e.length<=4){
	   
	   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
                document.getElementById("go").innerHTML = this.responseText;
			
            }
        };
        xmlhttp.open("GET", "search1.php?q="+e, true);
 xmlhttp.send();}
 
 else if(e.length<=9 && e.length>=4){
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
                document.getElementById("go").innerHTML = this.responseText;
			
            }
        };
        xmlhttp.open("GET", "search2.php?q="+e, true);
        xmlhttp.send();
		
 
 }
 else
 {
	  document.getElementById("go").innerHTML = "Sorry Match not Found";
	
   }
   }
    function PrintDiv() {
            var contents = document.getElementById("go").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>'+document.title+'</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
   </script>
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
                    
                    <li>
                        <a href="teacher-cm.php"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                   
                    <li>
                        <a href="preteacherfeedback1.php"><i class="fa fa-clock-o fa-fw"></i> Previous Feedback Reports</a>
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
            			<button type="submit" name="logout" class="btn bg-maroon btn-flat margin logout">Logout</button>
            		</div>
            	</form>
            </div><br>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Analze Feedbacks - Analyze Teacher</h1>
                </div>

                <div class="col-lg-12">
		<div id='go'>			
			<h1 class="page-header" style="font-size: 18px;"><?php echo $_SESSION['year']."(Group-".$group."".$group1.")";?>&nbsp;Feedback for&nbsp;<?php echo $teach; ?> </h1>
                   
                
			
			<?php echo "$msg"; ?><br><br>
				
               <?php 
	
	

		
	$res = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$u_id=array();
	$i=0;
	while($db_field = mysqli_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}
	
	$i=0;
		$res1 = mysqli_query($conn, "SELECT * FROM `cm_feed` WHERE year='$year' AND (sec='$group' OR sec='$group1') AND teacher_name='$teacher'");
	while($db_field1 = mysqli_fetch_assoc($res1))
	{
		$u_id[$i] = $db_field1['u_id'];
		$i++;
	}
	
	$u_id=array_unique($u_id);
	
	$given = count($u_id);
	if(mysqli_num_rows($res1) == 0)
	{
		$msg = "Sorry no one have given feedback yet.";
		echo "$msg";
	}
	else
	{
			$msg = "$given student(s) have given feedback yet and results are according to that.";
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
			$value[$j][$i] = per($questions[$j],$teacher,$group,$group1,$year,$sub);
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
echo "</table></div><br><br><input type='button' onclick='PrintDiv();' value='Print' />";


		
	
	}
				?>
               
</div>
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
