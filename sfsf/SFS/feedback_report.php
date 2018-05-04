<?php
session_start();
$user = $_SESSION['user'];
$name=$_SESSION['name'];
$msg="";
require "config/config.php";
$log = $_SESSION['admin'];
if($_SESSION['admin'] != "log")
{
		header ("Location: index.php");
		
}

	if(isset($_POST['year'])){
		$_SESSION['year'] = $_POST['year'];
		$_SESSION['Leet'] = $_POST['Leet'];
		header ("Location: finalbatchreport-cm.php");
		
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Feedback Reports | SLIET Feedback System</title>

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
   
   function s4()
   { 

var e = document.getElementById("kl");
var str = e.options[e.selectedIndex].value;
	   
	   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pol").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "date.php?q="+str, true);
        xmlhttp.send();
	   
   }
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
        xmlhttp.open("GET", "batch.php?q="+str, true);
        xmlhttp.send();
	   
   }
    function s2()
   {   
	   var e = document.getElementById("kl");
var str = e.options[e.selectedIndex].value;
var e = document.getElementById("kl1");
var str1 = e.options[e.selectedIndex].value;
var e = document.getElementById("kl2");
var str2 = e.options[e.selectedIndex].value; 
var e = document.getElementById("kl3");
var str3 = e.options[e.selectedIndex].value; 
 
str=str+","+str1+","+str2+","+str3;

 
	   
	   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if((this.responseText).length!=0)
                document.getElementById("go").innerHTML = this.responseText;
			 else
				  document.getElementById("go").innerHTML ="Sorry No Match Found";
            }
        };
        xmlhttp.open("GET", "pre-feed1.php?q="+str, true);
        xmlhttp.send();
	
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
                               <div> Administrator</div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <form action='' method='get'>
                        <div class="input-group custom-search-form">
                            <input id='kl4' type="text" class="form-control" placeholder="Batch or Faculty">
                            <span class="input-group-btn">
                                <button onclick='s3()' class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                    Search
                                </button>
								</form>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li>
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
                    <li class="selected">
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
            			<button type="submit" name="logout" class="btn bg-maroon btn-flat margin logout">Logout</button>
            		</div>
            	</form>
            </div><br>
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header" style="font-size: 18px;">Analyze Feedbacks - Analyze Teacher</h1>
                </div>
                
                <div class="form-group col-lg-2">
                <label>Course</label>
                <select id='kl2' class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" onmouseup="s()">
                  <option selected="selected" value='Degree(4-Year)'>Select a Course</option>
                  <option value='Degree(4-Year)'>Degree(4-Year)</option>
                  <option value='Degree(3-Year)'>Degree(3-Year)</option>
                </select>
              </div>
              <div class="form-group col-lg-3">
                <label>Branch</label>
                <select id='kl' class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" onmouseup="s4()"   >
                  <option value='c' selected="selected">Select a Branch</option>
                  <option  value="CM">Computer Science and Engineering</option>
                 
                </select>
              </div>
              <div class="form-group col-lg-2">
			  <div id='hj'>
                <label>Batch</label>
                <select  id='kl1' class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" onmouseup="s1()">
                  <option selected="selected" >Select a Batch</option>
				  
                  

                  
                </select> 
				</div>
              </div>
              <div class="form-group col-lg-3">
			  <div id='pol'>
                <label>Feedback Date</label>
				 
                <select id='kl3' class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                  <option selected="selected">Select a Date</option>
				 
				  
                  
                </select>
				
              </div>
</div>			  
		  
                <center>
                    <button onmouseup='s2()'  class="btn btn-primary"  align='left' style=" margin-top: 25px;"><span style="color: white">Search</span></button>
                </center>
				
           
     <!--End Page Header -->
            </div>
		
		<div id='go'>

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
		<div id='go'></div>
        </div>

</body>

</html>
