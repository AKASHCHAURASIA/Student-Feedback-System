<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['teacher'];
$name=$_SESSION['name'];
$msg="";
$branch="CM";
$msg3 = "";
$flag="1";
include 'config/config.php';
$conn = db();
if ($log != "log"){
	header ("Location: index.php");
	
}
if(isset($_POST['year'])){
	
		$_SESSION['teacher_name'] = $_POST['teacher_name'];
		$_SESSION['sub_code'] = $_POST['sub_code'];
		$_SESSION['sub_name'] = $_POST['sub_name'];
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
echo $_SESSION['sem'];	
		header ("Location: analyzeteacher3.php");
		
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Computer Science</title>
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
            			<button type="submit" name="logout" class='btn bg-maroon btn-flat margin logout'>Logout</button>
            		</div>
            	</form>
            </div><br>
            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome  <b><?php echo $_SESSION['name'];?></b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">My Feedback Report</h1>
                </div>
                <div>
                 <?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND B1='$code' AND P=0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $c1='B';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
				
							echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
							<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
                  
				  ".$c."-Class</h1>
                    </form>
                       
					 </span>";
						}
						break; 
					 }
				}
				?>
				<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form>
                      </span> 
					 ";
						}
						break; 
					 }
				}
				?>
				<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' style='outline: none; margin-right: 50px;background-color: #323232; width: 20%;' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form>
                     </span>  
					 ";
						}
						break; 
					 }
				}
				?>
					<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form>
                     </span>  
					 ";
						}
						break; 
					 }
				}
				?>
				<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form>
                       </span>
					 ";
						}
						break; 
					 }
				}
				?>
				<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND D1='$code' AND P=0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				        $c1='D';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
                ".$c."-Class  </h1>
                    </form>
                       </span>
					 ";
						}
						break; 
					 }
				}
				?>
				 <?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				       $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
						<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
                 ".$c."-".$lab." </h1>
                    </form>
                       </span>
					 ";
						}
						break; 
					 }
				}
				?>
				<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form>
                      </span> 
					 ";
						}
						break; 
					 }
				}
				?><?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE D1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 class='page-header' style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form>
                      </span> 
					 ";
						}
						break; 
					 }
				}
				?>
				
			
                   <?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{
				
                     
					 $code=$db_field['user'];
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE D2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<span style='position: relative; left: 20px'>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='teacher-cm.php' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$db_field1['sub_name']."' name='sub_name'/>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 class='page-header' style='font-size: 18px;'>

                         <button  name='year' value='".$db_field1['batch']."' type='submit' class='btn bg-maroon btn-flat margin logout'>".$db_field1['batch']."</button>
               							".$c."-".$lab."   </h1>
                    </form>
                       </span>
					 ";
						}
						break; 
					 }
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