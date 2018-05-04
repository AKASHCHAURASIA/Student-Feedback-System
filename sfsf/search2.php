
<?php 

require 'config/config.php';
$conn = db();
$r=$_REQUEST['q'];
$sem='';
$year='';
$feed='';
$year='';
if(strpos($r, '-') !== false  && (substr_count($r,"-")==2))
{


$r=explode("-",$r);

$r1=$r[0];
$r2=$r[1];
$r3=$r[2];
$r4=$r1."-".$r2;
 $SQL1 = "SELECT * FROM time_table WHERE batch='$r4'";
				 $result = mysqli_query($conn, $SQL1);
				if(mysqli_num_rows($result))
				{
					


if($r3=='AB' ||$r3=='CD'|| $r3=='cd' ||$r3=='ab')
{
	
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


if($r1=='GCS' || $r1=='gcs')
{
	$r2="GCS-".$r2;
	$feed='cm_feed';
	$branch='CM';
}
if($r3=='AB' || $r3=='Ab' || $r3=='aB' || $r3=='ab')
{
	$group1='A';
	$group2='B';
}
else{
$group1='C';
	$group2='D';

}



$suh = Array();
function per($question,$teacher,$feed,$group1,$group2,$year)
{
    $conn = db();
	$res = mysqli_query($conn, "SELECT * FROM `$feed` WHERE teacher_name='$teacher' AND year='$year' AND (sec='$group1' OR sec='$group2')");
	$values = Array();
	$suh = Array();
	$i = 0;
	$sum = $total = 0;
	while ($db_field = mysqli_fetch_assoc($res))
	{
		$values[$i] = $db_field["$question"];
		$suh[$i]=$db_field['sub_code'];
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

 
			      $teacher=array("0");
				  $rt=array("0","0","0","0","0","0","0","0","0","0");
				  $flag=0;
				  $k=0;
			$i=0;
				 $SQL1 = "SELECT * FROM time_table WHERE batch='$r2'";
				 $result = mysqli_query($conn, $SQL1);
				while ($db_field = mysqli_fetch_assoc($result))
				{   $subject=$db_field['sub_name']; 
			       $p=$db_field['P'];
				  $code1=$db_field['A1'];
				   $code2=$db_field['A2'];
				   $code3=$db_field['B1'];
				    $code4=$db_field['B2'];
				     $code5=$db_field['C1'];
					  $code6=$db_field['C2'];
				   $code7=$db_field['D1'];
				    $code8=$db_field['D2'];
				
                     
					if($group1=='A' || $group2=='B')
                        
					{  $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2' OR  user='$code3' OR user='$code4') AND branch='$branch' ";}
				else if($group1=='C' || $group2=='D')
				{$SQL2 = "SELECT * FROM users WHERE (user='$code5' OR user='$code6' OR  user='$code7' OR user='$code8') AND branch='$branch' ";}
				
				$result2 = mysqli_query($conn, $SQL2);
					while ($db_field1 = mysqli_fetch_assoc($result2))
					{
					
				      $teacher[$i]= $db_field1['user'];
					  
					  $i++;
					  
				}
				
				}
				$teacher=array_unique($teacher);
				$teacher=array_values($teacher);
				$su=array();
				$i=0;
				$p=0;
		

		
		
		
		
	
	for($i=0;$i<count($teacher);$i++)
	{$teac=$teacher[$i];
	  $res = mysqli_query($conn, "SELECT * FROM `$feed` WHERE teacher_name='$teacher[$i]' AND year='$year' AND (sec='$group1' OR sec='$group2')");
         if(mysqli_num_rows($res)==0)
        
        
        {   $res1 = mysqli_query($conn, "SELECT * FROM time_table WHERE  ( B1='$teacher[$i]' OR B2='$teacher[$i]' OR A1='$teacher[$i]' OR A2='$teacher[$i]' OR  C1='$teacher[$i]' OR  C2='$teacher[$i]' OR  D1='$teacher[$i]' OR  D2='$teacher[$i]') AND batch='GCS-15'") ;
		while($db_field1 = mysqli_fetch_assoc($res1))
	{
       $suh[$i]=$db_field1['sub_code'];
		
	}
                 }
				 else {
	while($db_field = mysqli_fetch_assoc($res))
	{
       $suh[$i]=$db_field['sub_code'];
		
	}
				 }
      
	}
    
  echo "   <div class='col-lg-12'>
                        <h1 class='page-header' style='font-size: 18px;'>".$r2."(".$group1."".$group2."):SEMESTER:".$sem."</h1>
                    </div>";

		
	$res = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$i=0;
	while($db_field = mysqli_fetch_assoc($res))
	{
		$questions[$i] = $db_field['q_id'];
		$i++;
	}
	$res1 = mysqli_query($conn, "SELECT * FROM users WHERE year='$year' AND chk='1' AND (u_group='$group1' OR u_group='$group2') AND branch='$branch'");
	$given = mysqli_num_rows($res1);
	if(mysqli_num_rows($res1) == 0)
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
	for($i=0;$i<count($teacher);$i++)
	{
		$sum = 0;
		$total[$i] = 0;
		for($j=0;$j<count($questions);$j++)
		{
			$value[$j][$i] = per($questions[$j],$teacher[$i],$feed,$group1,$group2,$year);
			$sum = $sum + $value[$j][$i];
		}
		$total[$i] = intval($sum/(count($questions)));
	}
  print "<th>Teacher</th>";
	$re = mysqli_query($conn, "SELECT * FROM ques");
	$questions = array();
	$i=0;
	while ($db_field = mysqli_fetch_assoc($re))
	{
		$questions[$i] = $db_field['question'];
		$j = $i + 1;
		
		
		$i++;
	}
        echo "<th>Subject</th>";
		echo "<th>Rating</th>";
	echo"</tr>";
	$teacher1=array();
	$sub_count = count($teacher);
	

	$que_count = count($questions);
	for($i=0;$i<$sub_count;$i++)
	{		
       $teacher2=$teacher[$i];
	$re = mysqli_query($conn, "SELECT * FROM users WHERE user='$teacher2'");
	
	while ($db_field = mysqli_fetch_assoc($re))
	{ 

      $teacher1[$i]=$db_field['name'];
	}
	}
	
	
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$teacher1[$i] ($teacher[$i])</td>";
	print "<td>$suh[$i]</td>";
	

	
	

	
	for($j=0;$j<=$que_count;$j++)
	{
		if($j != $que_count)
		{
			$e = $value[$j][$i];
			
		}
		else
		{
			$e = $total[$i];
			if($e==0)
			{
				print "<td>unavlaible</td>";
			}
			else if($e>1 && $e<=25){
				print "<td>Poor</td>";
			}
			else if($e<=50 && $e>25){
				print "<td>Satisfactory</td>";
			}
			else if($e<=70 && $e>50){
				print "<td>Good</td>";
			}
			else if($e>70 && $e<=85){
				print "<td>Very Good</td>";
			}
			else{
				print "<td>Excellent</td>";
		}
		}
	}
	print  "</tr>";
}
echo "</table></div><br><br><input type='button' onclick='PrintDiv();' value='Print' />";


		
	
	} 
}
else
{
echo "Search Not Found";
}
				}
else{
echo "Search NOt Found";	
}
}

else
{
echo "Search Not Found";
}
				?>


</div>

<style>

