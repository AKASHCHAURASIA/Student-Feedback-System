
<?php 

require 'config/config.php';
$conn = db();
$r=$_REQUEST['q'];
$SQL = "SELECT * FROM users WHERE post='teacher' AND user='$r'";
				$result = mysqli_query($conn, $SQL);
				 
				while ($db_field = mysqli_fetch_assoc($result))
				{ $code=$db_field['user'];
			       $branch=$db_field['branch'];
				   if($branch=='CM')
				   {
					   $dept="Computer Science and Engineering";
				   }
				   $db=$db_field['name'];
				  
				}	   
			if(mysqli_num_rows($result)!=0)
			{
				  echo "<div align='left'><div class='col-lg-12'>
                    <h1 class='page-header' style='font-size: 18px;'>".$db."</h1>";
                     
					  echo $dept;
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND B1='$code' AND P=0 ";
					 
					 echo "<table border='2'><tr>";
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				       $c1='B';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
				           
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                  
				  ".$c."".$c1."-Class</h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
				
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
					
					 }
				
			
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               ".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
			
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                         <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B2='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND D1='$code' AND P=0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				        $c1='D';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='".$c1."' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1 style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                ".$c."".$c1."-Class  </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND P>0";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				       $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
                 ".$c."-".$lab." </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
			
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C2='$code' AND P>0 ";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='C';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
					 
					 $SQL1 = "SELECT * FROM time_table WHERE D1='$code' AND P>0 ";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>
							
                                                  <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
              ".$c."-".$lab."    </h1>
                    </form></td>
                       
					 ";
						}
						
					 }

					 $SQL1 = "SELECT * FROM time_table WHERE D2='$code' AND P>0 ";
					 
					 
					 $result1 = mysqli_query($conn, $SQL1);
					 if(mysqli_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysqli_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='' method='post'>
							<input type='hidden' value='".$code."' name='teacher_name'/>
							<input type='hidden' value='".$c."' name='g'>
							<input type='hidden' value='' name='g1'>
						<input type='hidden' value='".$db_field1['sub_code']."' name='sub_code'/>
							<h1  style='font-size: 18px;'>

                                                 <button  name='year' value='".$db_field1['batch']."'  type='submit' class='btn btn-primary'>".$db_field1['batch']."</button>
               							".$c."-".$lab."   </h1>
                    </form></td>
                       
					 ";
						}
						
					 }
				
				echo "</tr></table>";}
				
				else
				{
					
					echo "Search Not Found";
				}
				
				
?>