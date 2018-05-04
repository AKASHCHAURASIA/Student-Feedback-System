<?php
session_start();
$user = $_SESSION['user'];
$msg="";
require "config/config.php";
if ($_SESSION['admin'] != "log"){
	header ("Location: index.php");
}
$namekey= $_REQUEST['key'];
$sub_table = "";
 $feed ="";
 $branch = "";
function per($question,$subject,$feed)
{
	$res = mysql_query("SELECT * FROM `$feed` WHERE subject='$subject'");
	$values = Array();
	$i = 0;
	$sum = $total = 0;
	while ($db_field = mysql_fetch_assoc($res))
	{
		$values[$i] = $db_field["$question"];
		$sum  = $sum + $values[$i];
		$total = $total + 5;
		$i++;
	}
	if($sum!=0)
	{
		return (intval(($sum/$total)*100));
	}
	else {

		return 0;
	}
}

?>

<html>
<title>Feedback Result</title>
<style>
h1{color:#FFF;}
header {
    padding: 0.5em;
    color: white;
    background-color:skyblue;
    clear: left;
    text-align:center;
	Width:100%;
}
</style>
<div class="wrapper">
<head>
<link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
 <header>
             <h1><img src='logo.png' align='left' height='75' >Student Feedback System Account:Admin</h1>
			 
        <table><tr> <td width="1000px" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="logot"></a></td></tr></table>
		<div id="cssmenu" class="cssmenu">
        <ul>
        	<li><a href="admin.php">Home</a></li>
        	<li><a href="#">Add Student</a>
        			<ul>
									<li><a href="add-cm.php?key=CM">Computer Science and Engineering</a></li>
									<li><a href="add-cm.php?key=C">Chemical Engineering</a></li>
									<li><a href="add-cm.php?key=CV">Civil Engineering</a></li>
									
									<li><a href="add-cm.php?key=EC">Electronics and Communication Engineering</a></li>
									<li><a href="add-cm.php?key=EE">Electrical And Intstrumentation Engineering</a></li>
									<li><a href="add-cm.php?key=IF">Food Engineering And Technology</a></li>
									<li><a href="add-cm.php?key=ME">Mechanical Engineering</a></li>
									<li><a href="#">Mathematics</a></li>
									<li><a href="#">Chemistry </a></li>
									<li><a href="#">Physics</a></li>
									<li><a href="add-cm.php?key=MH">Management And Humanities</a></li>
									
        		 </ul>
        	</li>
        	<li><a href="#">Delete Student</a>
						<ul>
								<li><a href="del-stud.php?key=CM">Computer Science and Engineering</a></li>
									<li><a href="del-stud.php?key=C">Chemical Engineering</a></li>
									<li><a href="del-stud.php?key=CV">Civil Engineering</a></li>
									
									<li><a href="del-stud.php?key=EC">Electronics and Communication Engineering</a></li>
									<li><a href="del-stud.php?key=EE">Electrical And Intstrumentation Engineering</a></li>
									<li><a href="del-stud.php?key=IF">Food Engineering And Technology</a></li>
									<li><a href="del-stud.php?key=ME">Mechanical Engineering</a></li>
									<li><a href="#">Mathematics</a></li>
									<li><a href="#">Chemistry </a></li>
									<li><a href="#">Physics</a></li>
									<li><a href="del-stud.php?key=MH">Management And Humanities</a></li>
					 </ul>
				 </li>
					<li><a href="#">See Result</a>
						<ul>
							<li><a href="result.php?key=CM">Computer Science and Engineering</a></li>
									<li><a href="result.php?key=C">Chemical Engineering</a></li>
									<li><a href="result.php?key=CV">Civil Engineering</a></li>
									
									<li><a href="result.php?key=EC">Electronics and Communication Engineering</a></li>
									<li><a href="result.php?key=EE">Electrical And Intstrumentation Engineering</a></li>
									<li><a href="result.php?key=IF">Food Engineering And Technology</a></li>
									<li><a href="result.php?key=ME">Mechanical Engineering</a></li>
									<li><a href="#">Mathematics</a></li>
									<li><a href="#">Chemistry </a></li>
									<li><a href="#">Physics</a></li>
									<li><a href="result.php?key=MH">Management And Humanities</a></li>
						</ul>
					</li>
						
						
          <li><a href="reset-feed.php">Reset Feedback</a></li>
					<li><a href="question.php">Question</a></li>
					<li><a href="#">Subjects</a>
						<ul>
							<li><a href="cm-subject.php">Computer Science and Engineering</a></li>
									<li><a href="c-subject.php">Chemical Engineering</a></li>
									<li><a href="cv-subject.php">Civil Engineering</a></li>
									
									<li><a href="ec-subject.php">Electronics and Communication Engineering</a></li>
									<li><a href="ee-subject.php">Electrical And Intstrumentation Engineering</a></li>
									<li><a href="if-subject.php?key=IF">Food Engineering And Technology</a></li>
									<li><a href="me-subject.php">Mechanical Engineering</a></li>
									<li><a href="#">Mathematics</a></li>
									<li><a href="#">Chemistry </a></li>
									<li><a href="#">Physics</a></li>
									<li><a href="mh-subject.php">Management And Humanities</a></li>
						</ul>
					</li>
					<li><a href="#">Profile</a>
						<ul>
								<li><a href="changepass.php">Change Password</a></li>
								<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
        </ul></div>
		</header>
    <link rel="stylesheet" href="css/normalize.css"><br><br>
<style>
.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  width: 97%;
  min-height: 97%;
  padding: 20px;
  background: rgba(4, 40, 68, 0.85);
  color:white;
  font-size: 14px;
}
form{
  text-align: left;
  align-items: center;
  color:white;
}
input,select{
  color: black;
}
td {
	text-align: center;
}
</style>
</head>

<body>


<?php
print"	<form action='result.php?key=".$namekey."' method='POST'>
		<input type='submit' name='year' class='logout' value='FY' >
		<input type='submit' name='year' class='logout' value='SY'>
		<input type='submit' name='year' class='logout' value='TY'>
	</form>
  <link href='css/stud.css' rel='stylesheet' type='text/css'/>";

if($namekey == "CM")
{
	$sub_table = "cm_subject";
	$feed = "cm_feed";
	$branch = "CM";
}
elseif($namekey == "IF")
{
	$sub_table = "if_subject";
	$feed = "if_feed";
	$branch = "IF";
}
elseif($namekey == "ME")
{
	$sub_table = "me_subject";
	$feed = "me_feed";
	$branch = "ME";
}
elseif($namekey == "EE")
{
	$sub_table = "ee_subject";
	$feed = "ee_feed";
	$branch = "EE";
}
elseif($namekey == "EC")
{
	$sub_table = "ec_subject";
	$feed = "ec_feed";
	$branch = "EC";
}
elseif($namekey == "MH")
{
	$sub_table = "mh_subject";
	$feed = "mh_feed";
	$branch = "MH";
}
elseif($namekey == "C")
{
	$sub_table = "c_subject";
	$feed = "c_feed";
	$branch = "C";
}
elseif($namekey == "CV")
{
	$sub_table = "cv_subject";
	$feed = "cv_feed";
	$branch = "CV";
}
if(isset($_POST['year'])){
	$year = $_POST['year'];
	$res = mysql_query("SELECT * FROM `$sub_table` WHERE year='$year'");
	$subjects = array();
	$i=0;
	while($db_field = mysql_fetch_assoc($res))
	{
		$subjects[$i] = $db_field['name'];
		$i++;
	}
	$res = mysql_query("SELECT * FROM ques");
	$questions = array();
	$i=0;
	while($db_field = mysql_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}
	$res1 = mysql_query("SELECT * FROM users WHERE year='$year' AND chk='1' AND branch='$branch'");
	$given = mysql_num_rows($res1);
	if(mysql_num_rows($res1) == 0)
	{
		$msg = "Sorry no one have given feedback yet.";
		echo "$msg";
	}
	else
	{
			$msg = "$given students have given feedback yet and results are according to that in Percentage.";
			print "<div id='print-content'>";
	echo "$msg<br><br><table class='reference' style='width:100%''>";
	$i = $j = 0;
	$sum = 0;
	$total = array();
	$value = array();
	for($i=0;$i<count($subjects);$i++)
	{
		$sum = 0;
		$total[$i] = 0;
		for($j=0;$j<count($questions);$j++)
		{
			$value[$j][$i] = per($questions[$j],$subjects[$i],$feed);
			$sum = $sum + $value[$j][$i];
		}
		$total[$i] = intval($sum/(count($questions)));
	}
  print "<th>Subject</th>";
	$re = mysql_query("SELECT * FROM ques");
	$questions = array();
	$i=0;
	while ($db_field = mysql_fetch_assoc($re))
	{
		$questions[$i] = $db_field['question'];
		$j = $i + 1;
		echo "<th>Question $j</th>";
		$i++;
	}
	echo"<th>Total</th><th>Grade</th></tr>";
	$sub_count = count($subjects);
	$que_count = count($questions);
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$subjects[$i]</td>";
	for($j=0;$j<=$que_count;$j++)
	{
		if($j != $que_count)
		{
			$e = $value[$j][$i];
			print "<td>$e</td>";
		}
		else
		{
			$e = $total[$i];
			print "<td>$e</td>";
			if($e<=25){
				print "<td>Poor</td>";
			}
			else if($e<=50 && $e>25){
				print "<td>Satisfactory</td>";
			}
			else if($e<=75 && $e>50){
				print "<td>Good</td>";
			}
			else{
				print "<td>Excellent</td>";
			}
		}
	}
	print  "</tr>";
}
}
}
?>
</table></div><br><br>
<style>
button{
	position: relative;
}
</style>
<input type="submit" onClick="printDiv('print-content')" value="Print Result">
<script type="text/javascript">
function printDiv(divName){
	var printContents = document.getElementById(divName).innerHTML;
	w= window.open();
	w.document.write(printContents);
	w.print();
	w.close();
}</script>
</body>
</html>
