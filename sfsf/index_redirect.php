<?php
session_start();
$user = $_SESSION['user'];

$log = $_SESSION['student'];
$msg = "";
$flag="1";
if ($log != "log"){
  header ("Location: index.php");
}
require_once 'config/config.php';

//login log check
        $SQL = "SELECT * FROM users WHERE Username='$user'";
        $conn = db();
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
			
			
			$chk = $db_field['chk'];
			$uid = $db_field['u_id'];
			$grp=$db_field['Group1'];
			$email=$db_field['email'];
			$branch = $db_field['branch'];
			$group = $db_field['u_group'];
			$batch= $db_field['batch'];
			
		}
		if($email!='' || $branch!='' || $batch!=''|| $group!='')
		{ header('Location: index_std.php');
		}   
if(isset($_POST['update'])){
    $email = $_POST['email'];
    $u_branch = $_POST['u_branch'];
    $u_group = $_POST['u_group'];
	$u_batch= $_POST['batch'];
	
   


    switch($u_branch){
        case '1':
            $u_branch = 'CM';
            break;
        case '2':
            $u_branch = 'C';
            break;
        case '3':
            $u_branch = 'EE';
            break;
        case '4':
            $u_branch = 'E';
            break;
        case '5':
            $u_branch = 'Food Engineering and Technology';
            break;
        case '6':
            $u_branch = 'Mechanical Engineering';
            break;
    }
	if($u_branch=='CM')
	{
		$u_batch='GCS-'.$u_batch;
	}
	
    
    
    $sql = "UPDATE users SET email = '".$email."',user = '".$user."', u_group = '".$u_group."' ,branch = '".$u_branch."', batch = '".$u_batch."',chk='0' WHERE Username = '".$user."' ";
    if($result = mysqli_query($conn, $sql)){
        header('Location: index_std.php');
    } else{
        $msg = "There was an error updating your profile";
        header('Location: index_redirect.php');
    }
        
		
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <style>
    .box-title{
    margin-top: 45%;
        z-index: 1000;
        }
    </style>
	<script>
	function s()
   { 

var e = document.getElementById("kl2");
var str = e.options[e.selectedIndex].value;
	   
	   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("hj").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "batch2.php?q="+str, true);
        xmlhttp.send();
	   
   }
   </script>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
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
                    <li class="selected">
                        <a href="index_redirect.php"> <i class="fa fa-home fa-fw"></i>Home</a>
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

                <!-- Page Header -->
            <div class="box box-info col-lg-6">
            <div class="box-header with-border">
              <h3 class="bo-title">Required Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="branch" class="col-sm-2 control-label">Branch</label>

                  <div class="col-sm-10">
                      <select class="form-control" id="branch" name="u_branch" required onmouseup='s()'>
                        <option value="0">Select your Branch</option>
                        <option value="1">Computer Science and Engineering</option>
                        
                      </select>
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="group" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                      <select id='kl2' class="form-control" id="group" name="u_group" required onmouseover='s()'>
                        <option value="0">Select Group</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                      </select>
                  </div>
                </div> 
<div class="form-group">
 <div id='hj'>
                  <label for="group" class="col-sm-2 control-label">Batch</label>
                
                  <div class="col-sm-10">
                      <select class="form-control" id="group" name="batch" required >
                        <option value="0">Select Batch</option>
                        

                      </select><span style='color:red;'>(Note:select your batch as in your Time-table).</span>
                  </div>
                </div> 	 
</div>				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="update">Submit Details</button>
              </div>
              <!-- /.box-footer -->
            </form>
                <?php
                print "$msg";
            ?>
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
