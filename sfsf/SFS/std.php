<?php
session_start();
$user = $_SESSION['user'];
$msg="";

$group=$_SESSION['group'];
$teacher=$_SESSION['teacher_name'];
$branch="CM";
$sub=$_SESSION['sub_code'];
require "config/config.php";
$log = $_SESSION['student'];
if($_SESSION['cmhod'] != "log")
{
		header ("Location: index.php");
		
}

function per($question,$teacher,$group,$year,$sub)
{
	$res = mysql_query("SELECT * FROM `cm_feed` WHERE teacher_name='$teacher' AND year='$year' AND sec='$group' AND sub_code='$sub' ");
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

$batch=$_SESSION['year'];
$batch=explode('-',$batch);
$batch1=$batch[0];
 $batch2=$batch[1];

 if(date('y')==$batch2){
	   $sem=1;$year='FY';}
	   
else if(date('y')==$batch2+1)
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
 elseif(date('y')==$batch2+3)
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=6;$year="TY";}
   else {
	  
   $sem=7;$year="FRY";}	 
 }
else if(date('y')==$batch2+3){
	 
          $sem=8;$year='FRY';
		  
}

<?php echo "$msg"; ?><br><br>
				
               <?php 
	
	

		
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
	echo "$msg<br><br><table border='2' style='width:55%''>";
	$i = $j = 0;
	$sum = 0;
	$total = array();
	$value = array();
	for($i=0;$i<1;$i++)
	{
		$sum = 0;
		$total[$i] = 0;
		for($j=0;$j<count($questions);$j++)
		{
			$value[$j][$i] = per($questions[$j],$teacher,$group,$year,$sub);
			$sum = $sum + $value[$j][$i];
		}
		$total[$i] = intval($sum/(count($questions)));
	}
  
	$re = mysql_query("SELECT * FROM ques");
	$questions = array();
	$i=0;
	while ($db_field = mysql_fetch_assoc($re))
	{
		$questions[$i] = $db_field['question'];
		$j = $i + 1;
		echo "<th>Subject</th>";
		echo "<th>Rating</th>";
		
		$i++;
	}
	echo"</tr>";
	$sub_count = 1;
	$que_count = count($questions);
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$sub</td>";
	
	

	
	

	
	for($j=0;$j<=$que_count;$j++)
	{
		if($j != $que_count)
		{
			$e = $value[$j][$i];
			
		}
		else
		{
			$e = $total[$i];
			echo $e;
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
echo "</table></div><br><br>";


		
	
	}
				?>