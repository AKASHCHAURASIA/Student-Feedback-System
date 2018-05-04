
<?php 

require 'config/config.php';
$conn = db();

$r=$_REQUEST['q'];

$r=explode(",",$r);
$r1=$r[0];
$r2=$r[1];
if($r1=='CM')
{
	$r2="GCS-".$r2;
}
$r3=$r[2];
 $r4=$r[3];
 $r5=$r[4];
 


$res = mysqli_query($conn, "SELECT * FROM previous_feed WHERE f_date='$r5' AND branch='$r1'");
while ($db_field = mysqli_fetch_assoc($res))
	{
		$table_name=$db_field['table_name'];
	    $time_table=$db_field['table_name1'];
		
		$y=$db_field['year'];
		$m=$db_field['month'];
	}


 
          

$SQL = "SELECT * FROM users WHERE branch='$r1' AND post='teacher' AND name='$r[3]'";
				$result = mysqli_query($conn, $SQL);
				while ($db_field = mysqli_fetch_assoc($result))
				{ $code=$db_field['user'];
			       
			
				  echo "<div align='left'><div class='col-lg-12'>
                    <h1 class='page-header' style='font-size: 18px;'>".$db_field['user']."</h1>";
                     
					 
					 if($r3=='Degree(4-Year)'){ 
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE A1='$code' AND B1='$code' AND P=0 AND batch='$r2'";
					 
					 echo "<table border='2'><tr>";
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $c1='B';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
				           
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                  
				  ".$c."".$c1."-Class</h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
				
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE A1='$code' AND P>0 AND batch='$r2' AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
					
					 }
				
			
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE A2='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
					
					  
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE B1='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					  
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE B2='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					 }
 if($r3=='Degree(3-Year)')
 {	 
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE C1='$code' AND D1='$code' AND P=0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				       $c1='D';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                ".$c."".$c1."-Class  </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					  
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE C1='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				       $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                 ".$c."-".$lab." </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE C2='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					 
					 $SQL1 = "SELECT * FROM $time_table WHERE D1='$code' AND P>0 AND batch='$r2' ";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
							<input type='hidden' value='".$r5."' name='d'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }

					 $SQL1 = "SELECT * FROM time_table WHERE D2='$code' AND P>0 AND batch='$r2'";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$db_field['user']."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							<input type='hidden' value='".$r5."' name='d'>

                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               							".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
 }
				
				echo "</tr></table>";}
				
				
?>