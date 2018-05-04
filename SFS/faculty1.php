
<?php 

require 'config/config.php';
$r=$_REQUEST['q'];
$sem='';
$year='';
$r=explode(",",$r);
$r1=$r[0];
$r2=$r[1];
if(date('y')==$r2){
	   $sem=1;$year='FY';}
	   
else if(date('y')==$r2+1)
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=2;$year="FY";}
   else {
	  
   $sem=3;$year="SY";}	 
 }
 else if(date('y')==($r2+2))
 { if( date('m')>=01 && date('m')<=07)
	 {  $sem=4;$year='SY';}
	
   else{
   $sem=5;$year="TY";	 }
 }
 elseif(date('y')==$r2+3)
 { if( date('m')>=01 && date('m')<=07)
	 { $sem=6;$year="TY";}
   else {
	  
   $sem=7;$year="FRY";}	 
 }
else if(date('y')==$r2+3){
	 
          $sem=8;$year='FRY';
}
echo $year."-".$sem;

if($r1=='CM')
{
	$r2="GCS-".$r2;
}
$r3=$r[2];



function per($question,$subject,$feed,$teach)
{
	$res = mysql_query("SELECT * FROM `$feed` WHERE subject='$subject' OR teacher_code='$teach'");
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

<?php


if($r1 == "CM")
{
	$sub_table = "time_table";
	$feed = "cm_feed";
	$branch = "CM";
}
else{
	$feed='cm_feed';
	$branch='CV';
}

	
	$res = mysql_query("SELECT * FROM `time_table` WHERE batch='$r2'");
	$subjects = array();
	$A1 = array();
	$A2 = array();
	$B1 = array();
	$B2 = array();
	$teacher1=array();
	$i=0;
	while($db_field = mysql_fetch_assoc($res))
	{
		$subjects[$i] = $db_field['sub_name'];
		if($r3=='Degree(4-Year)')
		{
		$A1[$i]=$db_field['A1'];
		$A2[$i]=$db_field['A2'];
		$B1[$i]=$db_field['B1'];
		$B2[$i]=$db_field['B2'];}
		if($r3=='Degree(3-Year)')
		{
		$A1[$i]=$db_field['C1'];
		$A2[$i]=$db_field['C2'];
		$B1[$i]=$db_field['D1'];
		$B2[$i]=$db_field['D2'];}
		
		$i++;
	}
	$teach=array();
	$teach=array_merge($A1,$A2,$B1,$B2);
	$t=count($teach);
   
 $teach=array_unique($teach);
   $teach = array_values($teach); 
    
	 
		
	

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
	for($i=0;$i<count($subjects);$i++)
	{
		$sum = 0;
		$total[$i] = 0;
		for($j=0;$j<count($questions);$j++)
		{
			$value[$j][$i] = per($questions[$j],$subjects[$i],$feed,$teach[$i]);
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
		echo "<th >A-Group</th>";
		echo "<th></th>";
		echo "<th >B-Group</th>";
		echo "<th></th>";
		echo "<th>Rating</th>";
		
		$i++;
	}
	echo"</tr>";
	$sub_count = count($subjects);
	$que_count = count($questions);
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$subjects[$i]</td>";
	print "<td colspan='2'>$A1[$i]</td>";
	print "<td>$A2[$i]</td";
	print "<td colspan='2'>$B1[$i]</td>";
	print "<td>$B2[$i]</td>";
	
	for($j=0;$j<=$que_count;$j++)
	{
		if($j != $que_count)
		{
			$e = $value[$j][$i];
			
		}
		else
		{
			$e = $total[$i];
			
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
<div id='print-content'
idfjkjj
</div>

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