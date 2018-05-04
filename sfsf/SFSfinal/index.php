<?php


session_start();

$user = "";
$pass = "";
$msg = "";
$forgot="";
require "config/config.php"	;
$conn = db();

/* for($i=4;$i<=20;$i++)
{
	$j=md5($i);
	mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','CM','student','FY')");
}
for(;$i<=40;$i++)
{
	$j=md5($i);
mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','CM','student','SY')");
}
for(;$i<=60;$i++)
{
	$j=md5($i);
mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','CM','student','TY')");
}
for(;$i<=80;$i++)
{
	$j=md5($i);
mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','IF','student','FY')");
}
for(;$i<=100;$i++)
{
	$j=md5($i);
mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','IF'','student','SY')");
}
for(;$i<=120;$i++)
{
	$j=md5($i);
mysql_query("INSERT INTO users VALUES('NULL',0,'$i','$j','IF','student','TY')");
}*/
if (isset($_POST['login']))
{
	$user	=	   $_POST['user'];
	$pass	=	md5($_POST['pass']);

	$res = $conn->query("SELECT * FROM users WHERE user='$user' AND pass='$pass'");
	if($res)
	{
	if(mysqli_num_rows($res) == 1)
	{
		$re = mysqli_fetch_assoc($res);
		$db_user = $re['user'];
		$db_pass =	$re['pass'];
		$db_post = $re['post'];
        $db_email = $re['email'];
        $db_group = $re['u_group'];
        $db_branch = $re['branch'];
        $batch = $re['batch'];
        $group = $re['u_group'];
        $db_post = $re['sp_post'];
		$db_post1=$re['post'];
        $db_name = $re['name'];

		if($user == $db_user and $pass == $db_pass)
		{
			if($db_post == 'admin')
			{
				session_start();
				$_SESSION['user'] = $user;
				$_SESSION['name'] = $db_name;
				$_SESSION['admin'] = "log";
				mysqli_close($conn);
				header("Location: analyzefeedback.php");
				
			}
			else if($db_post == 'cmhod')
						{
								session_start();
								$_SESSION['user'] = $db_user;
								$_SESSION['cmhod'] = "log";
                                $_SESSION['name'] = $db_name;
								mysqli_close($conn);
								header("Location: cmhod.php");
							}
							else if($db_post == 'ifhod')
							{
									session_start();
									$_SESSION['user'] = $db_user;
									$_SESSION['ifhod'] = "log";
									mysqli_close($conn);
									header("Location: ifhod.php");
									
							}
							else if($db_post1 == "student")
							{
                                $_SESSION['batch'] = $batch;
                                $_SESSION['group'] = $group;
                                $_SESSION['user'] = $db_user;
				                $_SESSION['student'] = "log";
                                if($db_email === '' || $db_group === '' || $db_branch === ''){
                                        header('Location: index_redirect.php');
                                    }else{
								mysqli_close($conn);
								header("Location: index_std.php");
                                    }
										
							}
                            else if($db_post1 == "teacher")
							{
								$_SESSION['user'] = $db_user;
				        $_SESSION['teacher'] = "log";
						$_SESSION['name']=$db_name;
								mysqli_close($Conn);
										header("Location: teacher-cm.php");
							}
						}
					}
					else
					{
						$msg =  "Wrong username or password.";
						$forgot= "Forgot Password? Contact your teacher.";
					}
				}
				else
				{
					$msg =  "Wrong username or password.";
					$forgot= "Forgot Password? Contact your teacher.";
				}
        
		mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/style.css">
<!--<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>-->
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
    
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};     
</script>
<!--[if lt IE 8]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body class="page1" id="top">
<!--==============================
              header
=================================-->
<header class="wrapper_g">
  <div class="nav" style="position: relative; top: 20px;"></div>
  <div class="container">
    <div class="row">
      <div class="grid_12 rel">
        <div class="logo" style="position: relative; top: -128px;">
          <a href="index.html">
            <img src="images/logo.png" height="180px" width="180px" alt="Logo alt">
          </a>
            <div class="title" height="170px" width="300px" style="line-height: 0.3px; max-width: 500px; min-width: 400px;">
            <p style="font-size: 16px; color: white; letter-spacing: 2px;">संत लौंगोवाल अभियांत्रिकी एवं प्रौद्योगिकी संस्थान</p>
            <p style="font-size: 12px;">(भारत सरकार द्वारा स्थापित)</p>
          	<p style="font-size: 16px; color: white; font-family: sans-serif;">Sant Longowal Institute of Engineering and Technology<br></p>
            <p style="font-size: 16px; color: white; font-family: sans-serif;">DEEMED UNIVERSITY
                <span style="font-size: 12px;">(Established by Govt. of India)</span></p>
            </div>
        </div> 
      </div>
    </div>
  </div>
  <div style="position: relative; top: -120px;">
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container">
      <div class="row">
        <div class="grid_12 ">
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li><a href="http://sliet.ac.in/"><span class="a">Home</span></a></li>
               <li><a href="http://sliet.ac.in/contact/"><span class="a">Contact us</span></a></li>
             </ul>
            </nav>
            <div class="clear"></div>
          </div>       
         <div class="clear"></div>  
        </div>
     </div> 
    </div> 
  </section>
  </div>
  <section class="page1_header">
    <div class="container" style="">
      <div class="row" style="">
        <div class="grid_4 square">
            <form role="form" class="login-form" method="post" action="">
                 <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group" >
                            <input id="user" type="text" class="input" placeholder="Roll number / ID" name="user">
                        </div>
                        <div class="group" >
                            <input id="pass" type="password" class="input" data-type="password" placeholder="Password" name="pass">
                        </div>
                        <div class="group">
                            <input type="submit" class="button"  value="Sign In" name="login" style="background-color: BLACK; color: white">
                            <span style="color: yellow; font-size: 14px">
                            <?php
                                echo $msg;
                            ?>
                            </span>
                        </div>

                    </div>
                 </div>
            </form>
	    </div>
      <div class="feedback_img" style="position: absolute; bottom: 10%; left: 60%; z-index: -10000;">
        	<img src="images/slide.png" height="400px !important" width="500px !important" >
      </div>
    </div>
  </section>
</header>

<section id="content"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <div class="grid_10 preffix_1 ta__center">
        <div class="greet">
          <h2 class="head__1">
            Welcome
          </h2>
        Online student feedback system is the web based feedback collecting system from the students and provides the automatic generation of a feedback which is given by students. We have developed student feedback system to provide feedback in a quick and easy manner.
      </div>
    </div>
  </div>
  
</body>
</html>