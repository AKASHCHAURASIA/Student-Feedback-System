<?php

require 'config/config.php';
$conn = db();
$batch=$_REQUEST['q'];
$batch=explode(",",$batch);
$batch1=$batch[0];
$batch2=$batch[1];
$batch3=$batch[2];
$batch4=$batch[3];
$batch2="GCS-".$batch2;
$res = mysqli_query($conn, "SELECT * FROM previous_feed WHERE f_date='$batch4' AND branch='$batch1'");
while ($db_field = mysqli_fetch_assoc($res))
	{
		$table_name=$db_field['table_name'];
		$time_table=$db_field['table_name1'];
		$que=$db_field['table_name2'];
		$y=$db_field['year'];
		$m=$db_field['month'];
	}


 
			      $teacher=array("0");
				  $rt=array("0","0","0","0","0","0","0","0","0","0");
				  $flag=0;
				  $k=0;
			$i=0;
				 $SQL1 = "SELECT * FROM $time_table WHERE batch='$batch2'";
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
					if($batch3=='Degree(4-Year)')
					{  $SQL2 = "SELECT * FROM users WHERE (user='$code1' OR user='$code2' OR  user='$code3' OR user='$code4') AND branch='$batch1' ";}
				if($batch3=='Degree(3-Year)')
				{$SQL2 = "SELECT * FROM users WHERE (user='$code5' OR user='$code6' OR  user='$code7' OR user='$code8') AND branch='$batch1' ";}
					 $result2 = mysqli_query($conn, $SQL2);
					while ($db_field1 = mysqli_fetch_assoc($result2))
					{
					
				      $teacher[$i]= $db_field1['name'];
					  
					  $i++;
					  
				}
				
				}
				$teacher=array_unique($teacher);
				$teacher=array_values($teacher);
			
			echo "<label>Faculty</label>
				
                <select id='kl3' class='form-control select2 select2-hidden-accessible' style='width: 100%;' tabindex='-1' aria-hidden='true' onmouseup='s2()' onmouseover='s2()'>";
				for($i=0;$i<count($teacher);$i++)
					
					echo"<option value='".$teacher[$i]."'>".$teacher[$i]."</option>";
				
				
				echo "</select>";
				
				
				?>
				
				
				