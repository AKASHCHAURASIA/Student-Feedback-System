<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['cmhod'];
include 'config/config.php';
$conn = db();
if ($log != "log"){
  header ("Location: index.php");
}
$msg = "";
if(isset($_POST['submit'])){
  $oldpass = md5($_POST['oldpass']);
  $newpass = md5($_POST['newpass']);
  $conpass = md5($_POST['conpass']);

  $res = mysqli_query($conn, "SELECT * FROM users WHERE user='$user'");
  $db_array = mysqli_fetch_array($res);
  $db_pass = $db_array['pass'];
  if($db_pass == $oldpass)
  {
    if($conpass != $newpass)
    {
      $msg = "Please enter same password.";
    }
    else
    {
      $change = mysqli_query($conn, "UPDATE users SET pass='$newpass' WHERE user='$user'");
      if($change)
      {
        $msg = "Sucessfully changed.";
      }
      else
      {
        $msg = "Try again.";
      }
    }
  }
  else
  {
      $msg = "Wrong old password.";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
.di {
    background-color: lightgrey;
    width: 500px;
    border: 0px solid green;
    padding: 20px;
    margin: 25px;
}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	 <link href="css/stud.css" rel="stylesheet" type="text/css"/>
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
                               <div> Head of Department </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="cmhod.php"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    
                   
                     <li>
                        <a href="analyzefeedback-cm.php"><i class="fa fa-flask fa-fw"></i> Analyze Feedback</a>
                    </li>
                    <li>
                        <a href="precmhodfeedback.php"><i class="fa fa-pencil fa-fw"></i> Previous Feedback Reports</a>
                    </li>
					<li >
                        <a href="preteacherfeedback2.php"><i class="fa fa-clock-o fa-fw"></i> Your Previous Feedback </a>
                    </li>
                    <li class='selected'>
                        <a href="cmhod-changepass.php"><i class="fa fa-key fa-fw"></i> Change Password</a>
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
                <div align='center'>
                <div class='di'>
                   <table class="reference" style="width:100%">
        <form action='cmhod-changepass.php' method='POST'>
          <tr><span style='color:black'> <?php if($msg){ echo "$msg"; } ?></span>
                  <td>Old Password :</td>
                  <td><input type='password' name='oldpass' class="txt_fld" required /></td>
          </tr>
            <tr>
                    <td>New Password :</td>
                    <td> <input type='password' name='newpass' class="txt_fld" required></td>
            </tr>
            <tr>
                  <td>  Confirm Password :</td>
                  <td> <input type='password' name='conpass' class="txt_fld" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
				  <input type="submit" class="btn btn-primary" name='submit' value='submit'/></td>
                </tr>
            </form>
            </table>
			
                </div>
				
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
<?php if($msg){ echo "$msg"; } ?>
</body>

</html>