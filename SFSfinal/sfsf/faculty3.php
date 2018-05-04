<?php

require 'config/config.php';
$batch=$_REQUEST['q'];
$batch=explode(",",$batch);
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
$batch3=$batch[2];
if($batch1=='CM')
{
	$feed='cm_feed';
	$branch='CM';
}
$batch2="GCS-".$batch2;
if($batch3=='Degree(4-Year)')
{
	$group1='A';
	$group2='B';
}
else{
$group1='C';
	$group2='D';

}


function per($question,$teacher,$feed,$group1,$group2,$year)
{
	$res = mysql_query("SELECT * FROM `$feed` WHERE teacher_name='$teacher' AND year='$year' AND (sec='$group1' OR sec='$group2')");
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

 
			      $teacher=array("0");
				  $rt=array("0","0","0","0","0","0","0","0","0","0");
				  $flag=0;
				  $k=0;
			$i=0;
				 $SQL1 = "SELECT * FROM time_table WHERE batch='$batch2'";
				 $result = mysql_query($SQL1);
				while ($db_field = mysql_fetch_assoc($result))
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
					if($batch3=='Degree(4-Year)')
					{  $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2' OR  user='$code3' OR user='$code4') AND branch='$batch1' ";}
				if($batch3=='Degree(3-Year)')
				{$SQL2 = "SELECT * FROM users WHERE (user='$code5' OR user='$code6' OR  user='$code7' OR user='$code8') AND branch='$batch1' ";}
					 $result2 = mysql_query($SQL2);
					while ($db_field1 = mysql_fetch_assoc($result2))
					{
					
				      $teacher[$i]= $db_field1['name'];
					  
					  $i++;
					  
				}
				
				}
				$teacher=array_unique($teacher);
				$teacher=array_values($teacher);
				$su=array();
				$i=0;
				$p=0;
		function run($batch1,$batch2,$batch3,$name,$p)
		{	
			$SQL = "SELECT * FROM users WHERE branch='$batch1' AND post='teacher' AND name='$name'";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result))
				{ $code=$db_field['user'];
			      
			
				  echo "<div align='left'><div class='col-lg-12'>
                   <h1 class='page-header' style='font-size: 18px;'>".$db_field['name']."</h1></td>";
                     
					 
					 if($batch3=='Degree(4-Year)'){ 
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND B1='$code' AND P=0 AND batch='$batch2'";
					  echo "<table border='2'><tr>";
					 echo "<td>";
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='AB';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
				           $su[$p++]=$db_field1['sub_code'];
						   
						   
							echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                  
				  ".$c."-Class</h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
				
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
					
					 }
				
			
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A2='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B1='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B2='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					 }
 if($batch3=='Degree(3-Year)')
 {	 
					  echo "<td>";
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND D1='$code' AND P=0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='CD';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					 echo "<td>";
					 
				           $su[$p++]=$db_field1['sub_code'];
						   
							echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                ".$c."-Class  </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='C';
				       $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					 echo "<td>";
					 
				           $su[$p++]=$db_field1['sub_code'];
						  
							echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                 ".$c."-".$lab." </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C2='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='C';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					 
					 $SQL1 = "SELECT * FROM time_table WHERE D1='$code' AND P>0 AND batch='$batch2' ";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }

					 $SQL1 = "SELECT * FROM time_table WHERE D2='$code' AND P>0 AND batch='$batch2'";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{  echo "<td>";-
					
				           $su[$p++]=$db_field1['sub_code'];
						   
					echo "".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
							<input type='hidden' value='".$db_field['name']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>

                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               							".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
					
 }
			echo $p;	
				echo "</tr>";}
				
	echo	"</table>";		
		}
		
		for($i=0;$i<count($teacher);$i++)
		{ run($batch1,$batch2,$batch3,$teacher[$i],$p);
	  
		}
		$su=array_unique($su);
		$su=array_values($su);
		for($i=0;$i<count($su);$i++)
		{ 
	echo count($su);
	  
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
  print "<th>Subject</th>";
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
	$sub_count = count($teacher);
	$que_count = count($questions);
for($i=0;$i<$sub_count;$i++)
{
	print "<tr>";
	print "<td>$teacher[$i]</td>";

	
	
print_r($su);
	
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
				
				
				