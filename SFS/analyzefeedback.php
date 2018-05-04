<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['admin'];
$name=$_SESSION['name'];
$branch="CM";
$msg3 = "";
$flag="1";
include 'config/config.php';
if ($log != "log"){
	header ("Location: index.php");
	
}
if(isset($_POST['year'])){
	
		$_SESSION['teacher_name'] = $_POST['teacher_name'];
		$_SESSION['sub_code'] = $_POST['sub_code'];
		$_SESSION['year']=$_POST['year'];
		$batch1=$_POST['year'];
		$b="$batch1";
		$_SESSION['g']=$_POST['g'];
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
		echo $sem;
		header ("Location: analyzeteacher2.php");
		
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="assets/css/style1.css" rel="stylesheet" type="text/css" />
    <title>HOME | SLIET Feedback System</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link href="assets/css/style1.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <script type="text/javascript">
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
 
 else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
                document.getElementById("go").innerHTML = this.responseText;
			
            }
        };
        xmlhttp.open("GET", "search2.php?q="+e, true);
        xmlhttp.send();
		
 
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
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side navhead" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse" >
                <!-- side-menu -->
                <ul class="nav" id="side-menu" style="background-color:#323232;">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="background-color: #323232">
                           
                            <div class="user-info" style="position: relative; left: 5%;">
                               <div>Adminisitrator</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input id='kl4' type="text" class="form-control" placeholder="Batch or Faculty">
                            <span class="input-group-btn">
                                <button onclick='s3()' class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                    Search
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="analyzefeedback.php"><i class="fa fa-home fa-fw"></i> Home <span ></span></a>
                    </li>
                    <li>
                        <a href="createfeedback.php"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Feedback <span ></span></a>
                    </li>
                    <li>
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
            <div class="header">
            	<form action="logout.php" method="post">
            		<div style="height: 100%; position: absolute; right: 0px;">
            			<button type="submit" name="logout" class="btn bg-maroon btn-flat margin logout">Logout</button>
            		</div>
            	</form>
            </div><br>
            
            <center>
                <section class="content-header">
                    <!-- Page Header -->
                    <div class="col-lg-12">
                        <h1 class="page-header" style="font-size: 18px;">Feedback Analysis</h1>
                    </div>
                    </section>
                    <div class="showcase" id="">
                        <li class="a"> 
                            <a href="analyzebatch.php"><img src="assets/img/thumb1.jpg" alt="web3canvas">
                            <h3 style="font-size: 17px;">Analyze Batch<i>+</i></h3>
                            <p style="font-size: 15px;">Click to analyze feedback report of particular batch</p>
                          </a>
                        </li>

                        <li class="a">
                            <a href="analyzeteacher.php"><img src="assets/img/thumb2.jpg" alt="web3canvas">
                            <h3 style="font-size: 17px;">Analyze Teacher<i>+</i></h3>
                            <p  style="font-size: 15px;">Click to analyze feedback report of particular Teacher</p>
                          </a>
                        </li>
                    </div>
                
            </center>
                 <br><br>      
        <div id='go'>
          <br><br>      
                <!--End Page Header -->
        </div>    
           
        <!-- end page-wrapper -->

    </div>
         
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
