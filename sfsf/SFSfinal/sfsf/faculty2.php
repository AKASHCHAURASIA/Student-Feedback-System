<?php $SQL = "SELECT * FROM users WHERE branch='$branch' AND post='teacher'";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result))
				{ $code=$db_field['user'];
			      $SQL2 = "SELECT * FROM users WHERE branch='$branch' AND post='teacher' AND name='$name'";
			      $result2 = mysql_query($SQL2);
				while ($db_field2 = mysql_fetch_assoc($result2))
				{ $code1=$db_field2['user']; }
			   if($code!=$code1){
			
				  echo "<div align='left'><div class='col-lg-12'>
                    <h1 class='page-header' style='font-size: 18px;'>".$db_field['name']."</h1>";
                     
					 
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND B1='$code' AND P=0";
					 
					 echo "<table border='2'><tr>";
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='AB';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
				           
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
			
				
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A1='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
			
				
                     
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE A2='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='A';
				        $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
			
					
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B1='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE B2='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='B';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND D1='$code' AND P=0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='CD';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
			
					  
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C1='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='C';
				       $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					
							echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
			
					 
					 $SQL1 = "SELECT * FROM time_table WHERE C2='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='C';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
					 
					 $SQL1 = "SELECT * FROM time_table WHERE D1='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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

					 $SQL1 = "SELECT * FROM time_table WHERE D2='$code' AND P>0";
					 
					 
					 $result1 = mysql_query($SQL1);
					 if(mysql_num_rows($result1))
					 { $c='D';
				 $lab='Lab';
					 	while ($db_field1= mysql_fetch_assoc($result1))
						{ 
					echo "<td>".$db_field1['sub_name'].""."       ("."".$db_field1['sub_code']."".")"."<form action='cmhod.php' method='post'>
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
				
				echo "</tr></table>";}
				}
				?>
				