<?php
session_start();
$user = $_SESSION['user'];
$log = $_SESSION['student'];
$msg = "";
$flag="1";
include 'config/config.php';
$conn = db();
//login log check
if ($log != "log"){
	header ("Location: index.php");
}


$t = $_SESSION['t'];
$s1 = $_SESSION['s'];

    //sesion check
		$SQL = "SELECT * FROM users WHERE user='$user'";
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
		{
			$db_user = $db_field['user'];
			$db_pass = $db_field['pass'];
			$db_year = $db_field['year'];
			$branch = $db_field['branch'];
			$batch = $db_field['batch'];
			$group = $db_field['u_group'];
            		
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
		
if($chk=="1")
{
		$msg= " You already have submited the feedback.";
    
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
					
                    $flag=0;
					$c = 0;
					$a1 = array();
            
					$i = 0 ;
            $SQL = "SELECT * FROM users WHERE user='$t'";
		$res = mysqli_query($conn, $SQL);
		while ($db_field = mysqli_fetch_assoc($res))
					//$ressub = mysqli_query("SELECT * FROM `$sub_table` WHERE batch='$batch'") or die();
				//	while($db_field = mysqli_fetch_assoc($ressub))
					{
						$tn=$db_field['name'];
						
					}
               
					$j = 0;

						for($i=0;$i<1;$i++)
						{
                           
							for($j=0;$j<count($questions);$j++)
							{
                                
								$element = $s[$i][$j];
								if($j == 0)
								{
									if($i==0)
									{
                                        $resl = mysqli_query($conn, "SELECT * FROM `$feed` WHERE u_id = '$uid' AND teacher_name = '$t'");
                                        if(mysqli_num_rows($resl) == 1){
                                            $flag = 0;
                                            break;
                                            
                                        }
												else if(mysqli_query($conn, "INSERT INTO `$feed` (`u_id`,`sub_code`,`teacher_name`,`year`, `sec`,`$questions[$j]`) VALUES('$uid','$s1','$t','$db_year','$group','$element')"))
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
										if(mysqli_query($conn, "INSERT INTO `$feed` (`u_id`,`sub_code`,`teacher_name`,`year`, `sec`,`$questions[$j]`) VALUES('$uid','$s1','$t','$db_year','$group','$element')"))
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
									if(mysqli_query($conn, "UPDATE `$feed` SET `$questions[$j]`='$element' WHERE `u_id`='$uid' AND `sub_code`='$s1'"))
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
                        <a href="index_std.php"> <i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="change_stud_pass.php"><i class="fa fa-key fa-fw"></i> Change Password</a>
                    </li>
                    <li class="logout-responsive" style="display: none;">
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h1 class="page-header">Feedback Form</h1>
                </div>
                <!--End Page Header -->
            </div>
				<p class="msg"><?php if($msg==""){ }else{echo $msg."<p> Click <a href='index_std.php'>here</a> to continue to the home page!"; exit();} ?></p>

              <form action="feedback.php" method="POST">


	
	


	<?php
		$que_data = mysqli_query($conn, "SELECT * FROM ques");
		$no = 1;
		$i = 0;
                   $w = 0;
		//$subjects = mysqli_query("SELECT * FROM `$sub_table` WHERE batch='$db_year' AND sub_code='CST-61");
		while($db_field=mysqli_fetch_assoc($que_data))
		{
			$a = $db_field['question'];
			print "$no.";
			print "$a";
           
			for($j=0;$j<1;$j++)
			{ 
					print"<br><br><td>
                    <input type='radio' name='s[$j][$i]' value='1' required id='".$w."'><label for='".$w."'>Poor</label>
				<input type='radio' name='s[$j][$i]' value='2' required id='".($w+1)."'><label for='".($w+1)."'>Satisfactory</label>
					<input type='radio' name='s[$j][$i]' value='3' required id='".($w+2)."'><label for='".($w+2)."'>Good</label>
					<input type='radio' name='s[$j][$i]' value='4' required id='".($w+3)."'><label for='".($w+3)."'>very Good</label>
					<input type='radio' name='s[$j][$i]' value='5' required id='".($w+4)."'><label for='".($w+4)."'>Excellent</label><br><br>
					</td>";
			}

			print "</tr>";
			$no++;
			$i++;
            $w=$w+6;
			//$j = $j + 1;
		}

	?>

    <center>
        <button type="submit" name="submit" value="submit">
            <span class="state" type="submit" name="submit" value="submit">Submit</span>
        </button>
    </center>

</div>
</form>


</div>
	</body>
</html>
