<?php


session_start();

$user = "";
$pass = "";
$msg = "";
$forgot="";
require "config/config.php"	;
$conn = db();
// if user tries to come to the index page without logging out
if(isset($_SESSION['user'])){
    $res = $conn->query("SELECT * FROM users WHERE Username='{$_SESSION['user']}'");
	echo mysqli_num_rows($res);
	
	if($res)
	{
	if(mysqli_num_rows($res) == 1)
	{
		$re = mysqli_fetch_assoc($res);
		$db_post = $re['post'];
        if($db_post == 'admin'){
            header('Location: analyzefeedback.php');
        }
        else if($re['sp_post'] == 'cmhod'){
            header('Location: cmhod.php');
        }
        else if($db_post == 'teacher'){
            header('Location: teacher-cm.php');
        }
        else if($db_post == 'student'){
            header('Location: index_std.php');
        }
    }
}
}else{

if (isset($_POST['login']))
	  
     
	 
{ 

//Upload a blank cookie.txt to the same directory as this file with a CHMOD/Permission to 777
function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);   

}   
               
 function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}

 

if(grab_page("http://10.1.0.7:8090/httpclient.html"))
{
	


 $xml=login("http://10.1.0.7:8090/login.xml","mode=191&username=gcs1540030&password=akash.123@&a=1502028051926&prototype=0");
 
 print"<br>";
 

$xml1=explode('<message>',$xml);



$xml2=explode('</message>',$xml1[1]);

$xml3=explode('A[',$xml2[0]);

$xml4=explode(']]>',$xml3[1]);
 
 
 
}
else
{
$xml4[0]='Server is not response';
}


 
   if($xml4[0]=='You have successfully logged in.DO NOT SHARE YOUR CYBEROAM PASSWORD.CYBEROAM Password must meet complexity.' ||  $xml4[0]=='You have reached Maximum Login Limit. (Already Logged In Somewhere)' || $xml4[0]=='Your data transfer has been exceeded, Wait for Restoration of Your Limit (Next Day)')
	
	{	 $user	=	   $_POST['user'];
	
    

	$res = $conn->query("SELECT * FROM users WHERE Username='$user'");
	if($res)
	{ 

	if(mysqli_num_rows($res))
	{
		$re = mysqli_fetch_assoc($res);
		$db_user = $re['Username'];
		$db_user1= $re['user'];
		$db_post = $re['post'];
        $db_email = $re['email'];
        $db_group = $re['u_group'];
        $db_branch = $re['branch'];
		$db_batch = $re['batch'];
        $batch = $re['batch'];
        $group = $re['u_group'];
        $db_post = $re['sp_post'];
	    $db_post1=$re['post'];
		$db_group1=$re['Group1'];
	
	
        $db_name = $re['name'];

		if($user == $db_user)
		{
			
				if($db_group1=='3yrDegree2k'.Date('y') ||$db_group1=='3yrDegree2k'.(date('y')-1) || $db_group1=='3yrDegree2k'.(date('y')-2)|| $db_group1=='3yrDegree2k'.(date('y')-3)||$db_group1=='3yrDegree2k'.(date('y')-4)||$db_group1=='3yrDegree2k'.Date('y') ||$db_group1=='3yrDegree20'.date('y') ||$db_group1=='3yrDegree20'.(date('y')-1) || $db_group1=='3yrDegree20'.(date('y')-2)|| $db_group1=='3yrDegree20'.(date('y')-3)||$db_group1=='3yrDegree20'.(date('y')-4)||$db_group1=='4yrDegree2k'.Date('y') ||$db_group1=='4yrDegree2k'.date('y') ||$db_group1=='4yrDegree2k'.(date('y')-1) || $db_group1=='4yrDegree2k'.(date('y')-2)|| $db_group1=='4yrDegree2k'.(date('y')-3)||$db_group1=='4yrDegree2k'.(date('y')-4)||$db_group1=='4yrDegree2k'.Date('y') ||$db_group1=='4yrDegree20'.date('y') ||$db_group1=='4yrDegree20'.(date('y')-1) || $db_group1=='4yrDegree20'.(date('y')-2)|| $db_group1=='4yrDegree20'.(date('y')-3)||$db_group1=='4yrDegree20'.(date('y')-4))
				 $db_post1='student';
			else if($db_group1=='Contract_2014-15' || $db_group1=='Open Group')
					$db_post1='teacher';
				else
				{
					$msg='you Can not Login To This Site';
				}
	      
			if($db_post1=='admin')
			{
				session_start();
				$_SESSION['user'] = $db_user;
				$_SESSION['name'] = $db_name;
				$_SESSION['admin'] = "log";
				mysqli_close($conn);
				header("Location: analyzefeedback.php");
				
			}
            else if($db_post == 'subadmin')
			{
				session_start();
				$_SESSION['user'] = $user;
				$_SESSION['name'] = $db_name;
				$_SESSION['subadmin'] = "log";
				mysqli_close($conn);
				header("Location: subanalyzefeedback.php");
				
			}
			else if($db_post == 'cmhod')
						{
								session_start();
								$_SESSION['user'] = $db_user;
								$_SESSION['cmhod'] = "log";
                                $_SESSION['name'] = $db_name;
								$_SESSION['branch']=$db_branch;
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
								if($batch!='')
								{
								$batch=explode('-',$batch);
								$batch2=$batch[1];
								
									if(date('y')==$batch2){
	   $sem=1;$year='FY';}
	   
else if(date('y')==($batch2+1))
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
 elseif(date('y')==($batch2+3))
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=6;$year="SY";}
   else {
	  
   $sem=7;$year="FRY";}	 
 }
else if(date('y')==($batch2+3)){
	 
          $sem=8;$year='FRY';
}






								$res=mysqli_query($conn, "UPDATE users SET year='$year' WHERE Username='$db_user'");}
								


                                if($db_email == '' || $db_group == '' || $db_branch == '' || $db_batch ==''){
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
						$_SESSION['branch']=$db_branch;
						 if($db_email === '' || $db_branch === '' || $db_user1 ===''){
                                        header('Location: teacher_redirect.php');
                                    }else{
								mysqli_close($conn);
								header("Location: teacher-cm.php");
                                    }
								
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
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
	font-family: "Open Sans", sans-serif;
	height: 100vh;
	background: 50% fixed;
	background-size: cover;
	background-image: url(sliet.jpg);
	background-repeat: no-repeat;
}
@keyframes spinner {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(359deg);
  }
}
* {
  box-sizing: border-box;
}
.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;

	font-family: :Kristen ITC;
}
.title{
  font-family: Kristen ITC;
}
.login {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.login.loading button {
  max-height: 100%;
  padding-top: 50px;
}
.login.loading button .spinner {
  opacity: 1;
  top: 40%;
}
.login.ok button {
  background-color: #8bc34a;
}
.login.ok button .spinner {
  border-radius: 0;
  border-top-color: transparent;
  border-right-color: transparent;
  height: 20px;
  animation: none;
  transform: rotateZ(-45deg);
}
.login input {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #ccc;
}
.login input + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login input:focus {
  outline: none;
  color: #444;
  border-color: #2196F3;
  border-left-width: 35px;
}
.login input:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
.login a {
  font-size: 0.8em;
  color: #2196F3;
  text-decoration: none;
}
.login .title {
  color: #444;
  font-size: 1.2em;
  font-weight: bold;
  margin: 10px 0 30px 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
}
.login button {
  width: 100%;
  height: 100%;
  padding: 10px 10px;
  background: #2196F3;
  color: #fff;
  display: block;
  border: none;
  margin-top: 20px;
  position: absolute;
  left: 0;
  bottom: 0;
  max-height: 60px;
  border: 0px solid rgba(0, 0, 0, 0.1);
  border-radius: 0 0 2px 2px;
  transform: rotateZ(0deg);
  transition: all 0.1s ease-out;
  border-bottom-width: 7px;
}
.login button .spinner {
  display: block;
  width: 40px;
  height: 40px;
  position: absolute;
  border: 4px solid #ffffff;
  border-top-color: rgba(255, 255, 255, 0.3);
  border-radius: 100%;
  left: 50%;
  top: 0;
  opacity: 0;
  margin-left: -20px;
  margin-top: -20px;
  animation: spinner 0.6s infinite linear;
  transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
  box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
}
.login:not(.loading) button:hover {
  box-shadow: 0px 1px 3px #2196F3;
}
.login:not(.loading) button:focus {
  border-bottom-width: 4px;
}
footer {
  display: block;
  padding-top: 50px;
  text-align: center;
  color: #ddd;
  font-weight: normal;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
  font-size: 0.8em;
	position: auto;
}
footer a, footer a:link {
  color: #fff;
	position: auto;

}
</style>
<title>Home</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="css/style.css">
<!--<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
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
            <form action="login.php" method="post">
				<table align=center border="0" width="30%">
					<tr>
						<td><h3>Username</h3></td>
						<td><input type=text name=user required></td>
					</tr>
					<tr>
						<td><h3>Password</h3></td>
						<td><input type=password name=pass required></td>
					</tr>
				</table>
				<button type=submit>Login</button>
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