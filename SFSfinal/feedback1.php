<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
$msg = "";
$flag="1";
include 'config/config.php';

//login log check
if ($log != "log"){
	header ("Location: index.php");
}

$t = $_SESSION['t'];
$s1 = $_SESSION['s'];


$conn = db();
    //sesion check
		$SQL = "SELECT * FROM users WHERE user='$user'";
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
			$db_user = $db_field['user'];
			$db_pass = $db_field['pass'];
			$db_batch = $db_field['batch'];
			$db_year = $db_field['year'];
			$branch = $db_field['branch'];
			
            switch($branch)	{
	            case "CM":
			
				$feed = "cm_feed";
				$sub_table = "cm_subject";
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
		
if($chk=="1")
{
		$msg= " You already have submited feedback.";
}
else{
		if(isset($_POST['submit']))
		{
				$i = 0;

			$re = mysqli_query($conn, "SELECT * FROM ques");
			$questions = array();
			$qid = array();
			while ($db_field = mysqli_fetch_assoc($re))
			{
				$questions[$i] = $db_field['q_id'];
				$i++;
			}
			$que_count = count($questions);
					$s = $sub = array();
					$s = $_POST['s'];
					$message = $_POST['message'];
					$flag=1;
					$c = 0;
					$a1 = array();
					$i = 0 ;
					
						$a1[$i] = $s;
						
					$j = 0;
            $a1=array_unique($a1);
           print_r( array_values($a1));

						for($i=0;$i<count($a1);$i++)
						{

							for($j=0;$j<count($questions);$j++)
							{
								$element = $s[$i][$j];
								if($j == 0)
								{
									if($i==0)
									{
												if(mysqli_query($conn, "INSERT INTO `$feed` (`u_id`,`sub_code`,`teacher_name`,`year`, `sec`, `$questions[$j]`) VALUES('$uid','$s1','$t','$db_year','$element')"))
												{
														$flag = 1;
												}
												else{
															$flag = 0;
															break;
												}
									}
									else
									{
										if(mysqli_query($conn, "INSERT INTO `$feed` (`u_id`,`sub_code`,`teacher_name`,`year`, `sec`, `$questions[$j]`) VALUES('$uid','$a1[$i]','$t','$db_year','$element')"))
										{
											$flag = 1;
										}
										else{
											$flag = 0;
											break;
										}
									}
								}
								else
								{
									if(mysqli_query($conn, "UPDATE `$feed` SET `$questions[$j]`='$element' WHERE `u_id`='$uid' AND `subject`='$a1[$i]'"))
									{
										$flag = 1;
									}
									else{
										$flag = 0;
										break;
									}
								}
							}
						}
						if($flag == 1)
						{
							mysqli_query($conn, "UPDATE users SET chk='1' WHERE user='$user'");
							$msg="Your Feedback is Submitted Successfully, Thank You.";
						}
						else{
							$msg = "Sorry Contact Admin.";
						}
		}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Form</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    
    <style>
        #page-wrapper{
            background-color: white !important;
        }
        
        label{
            padding-right: 120px;
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
                                <br><br><?php echo $user;?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="index_std.html"> <i class="fa fa-home fa-fw"></i>Home</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-clock-o fa-fw"></i>Feedback Reports</a>
                    </li>
                </ul>
                        <!--end user image section-->
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
                <div class="col-lg-12">
                    <h1 class="page-header">Feedback Form</h1>
                </div>
                <!--End Page Header -->
            </div>
				<p class="msg"><?php if($msg==""){ }else{print "$msg"; exit();} ?></p>

              <form action="feedback.php" method="POST">


	
	


	<?php
		$que_data = mysqli_query($conn, "SELECT * FROM ques");
		$no = 1;
		$i = 0;
		$subjects = mysqli_query($conn, "SELECT * FROM `time_table` WHERE batch='$db_batch' AND sub_code='$s1' ");
		while($db_field=mysqli_fetch_assoc($que_data))
		{
			$a = $db_field['question'];
			print "$no.";
			print "$a";
			for($j=0;$j<1;$j++)
			{
					print"<br><td><input type='radio' name='s[$j][$i]' value='1' required>Poor
					<br>
					<input type='radio' name='s[$j][$i]' value='2' required>Satisfactory
					<br>
					<input type='radio' name='s[$j][$i]' value='3' required>Good
					<br>
					<input type='radio' name='s[$j][$i]' value='4' required>very Good
					<br>
					<input type='radio' name='s[$j][$i]' value='5' required>Excellent
					</td></br>";
			}

			print "</tr>";
			$no++;
			$i++;
			$j = $j + 1;
		}

	?>


<br><p>Enter Your Written feedback Here:*(If for particular subject or teacher please mention it)
<textarea name="message" rows="4" cols="50">
</textarea><br></p><p>
<button type="submit" name="submit" value="submit">
      <span class="state" type="submit" name="submit" value="submit">Submit</span>
    </button></p>

</div>
</form>


</div>
	</body>
</html>
<?php

?>