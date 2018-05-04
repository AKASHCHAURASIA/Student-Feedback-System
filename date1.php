<?php

require "config/config.php";
$conn = db();
$q=$_REQUEST['q'];
$i=0;
  $date=array();
$SQL2 = "SELECT * FROM previous_feed WHERE branch='$q'";
    
					 $result2 = mysqli_query($conn, $SQL2);
					while ($db_field1 = mysqli_fetch_assoc($result2))
					{
						$date[$i]=$db_field1['f_date'];
						$i++;
					}
				
echo "<label>Feedback-Date</label><select id='kl4' class='form-control select2 select2-hidden-accessible' style='width: 100%;' tabindex='-1' aria-hidden='true ><option selected='selected' onmouseup='s5()' onmouseover='s5()'>Select a Date</option>";
                for($i=0;$i<count($date);$i++) 
{	
 echo "<option selected='selected' value='".$date[$i]."'>".$date[$i]." </option>";}
				  
				
				
            echo  "</select>";




?>
