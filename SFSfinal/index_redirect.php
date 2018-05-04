<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
$msg = "";
$flag="1";
require_once 'config/config.php';

//login log check
        $SQL = "SELECT * FROM users WHERE user='".$_SESSION['user']."'";
        $conn = db();
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
			
			}
			$chk = $db_field['chk'];
			$uid = $db_field['u_id'];

if(isset($_POST['update'])){
    $email = $_POST['email'];
    $u_branch = $_POST['u_branch'];
    $u_group = $_POST['u_group'];
    
    switch($u_branch){
        case '1':
            $u_branch = 'Computer Science and Engineering';
            break;
        case '2':
            $u_branch = 'Chemical Engineering';
            break;
        case '3':
            $u_branch = 'Electronics and Communication Engineering';
            break;
        case '4':
            $u_branch = 'Electrical and Instrumentation Engineering';
            break;
        case '5':
            $u_branch = 'Food Engineering and Technology';
            break;
        case '6':
            $u_branch = 'Mechanical Engineering';
            break;
    }
    
    switch($u_group){
        case '1':
            $u_group = 'A';
            break;
        case '2':
            $u_group = 'B';
            break;
        case '3':
            $u_group = 'C';
            break;
        case '4':
            $u_group = 'D';
            break;    
    }
    
    $sql = "UPDATE users SET email = '".$email."', u_group = '".$u_group."' WHERE user = '".$user."' ";
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
                                <div><br><br><?php echo $user;?></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="index_std.php"> <i class="fa fa-home fa-fw"></i>Home</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-clock-o fa-fw"></i>Feedback Reports</a>
                    </li>
                    <li>
                        <a href="change_stud_pass.php"> <i class="fa fa-home fa-fw"></i>Change Password</a>
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
                    <div style="height: 100%; position: relative; left: 82%;">
                        <button type="submit" name="logout" style="background-color: #972217; height: 100%; color: white; outline: none; border: none; height: 59px; width: 100px;">Logout</button>
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
                      <select class="form-control" id="branch" name="u_branch" required>
                        <option value="0">Select your Branch</option>
                        <option value="1">Computer Science and Engineering</option>
                        <option value="2">Chemical Engineering</option>
                        <option value="3">Electronics and Communication Engineering</option>
                        <option value="4">Electrical and Instrumentation Engineering</option>
                        <option value="5">Food Engineering and Technology</option>
                        <option value="6">Mechanical Engineering</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="group" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                      <select class="form-control" id="group" name="u_group" required>
                        <option value="0">Select Group</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                      </select>
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
