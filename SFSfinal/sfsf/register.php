<?php

session_start();
$user = "";
$pass = "";
$msg = "";
$forgot="";
include "config/config.php"	;
$servername = "localhost";
$username = "root";
$password = "";
$db= "sfs";
$db_handle = mysqli_connect($servername, $username, $password,$db);

if (isset($_POST['register']))
	
{   
	$user	=	$_POST['user'];
	$pass	=	md5($_POST['pass']);
	$pass1  =   md5($_POST['pass1']);
	$branch =   $_POST['branch'];
	$email  =   $_POST['email'];
	$post   =   $_POST['post'];
	if(!strcmp("$pass","$pass1"))
		
		{
	$res = "INSERT INTO users (user,pass,branch,post,year) VALUES('$user','$pass','$branch','$post','$email')";
	$result =	mysqli_query($db_handle,$res);
	if($result)
		$msg="You Will be Successfully Register";}
		else
		{
			$msg=' Two Passwords Are Not Match!';
			
		}

	}

?>

<html>
  <head>
	<!-- <meta http-equiv='refresh' content='2;url='index.php'> -->
    <title>Student Feedback System</title>
<link rel="stylesheet" href="css/normalize.css">
<link href="css/mystyle.css" rel="stylesheet" type="text/css">

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
<link rel="stylesheet" href="styles.css">
</head>
<body background="sliet.jpg">


    <div class="wrapper">
	<table><tr><td></td>
         <td width="1000px" align="right"><a href="index.php" class="logout">Login</a></td></tr></table>

  <form class="login" method="POST" action="register.php">
    <p class="title" align="center">Student Feedback System</p>

	  <input type="text" placeholder="Username" name="user" required autofocus/>
    <i class="fa fa-user"></i>
	<input type="text" placeholder="Year" name="email" required autofocus/>
    <i class="fa fa-user"></i>
	<input type="text" placeholder="Branch" name="branch" required autofocus/>
    <i class="fa fa-user"></i>
	<input type="text" placeholder="Post" name="post" required autofocus/>
    <i class="fa fa-user"></i>

	  <input type="password" placeholder="Password" name="pass" required/>
    <i class="fa fa-key"></i>
	 <input type="password" placeholder="conform-Password" name="pass1" required/>
    <i class="fa fa-key"></i>
	

	  <a href="#"><?php echo "$msg"; ?></a>
    <button type="submit" name="register" value="Register">
    <i class="spinner"></i>
      <span class="state" type="submit" name="register" value="register">Register</span>
    </button>
	</form>
</p><br><br><br><br><br><br><br><br><br>
	<footer><br><a href="about.php">About Us</a></footer>
</div>
	</div>
		</div>
</body>
</html>
