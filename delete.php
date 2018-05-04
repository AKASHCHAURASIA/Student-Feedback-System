<?php

echo $namekey = $_REQUEST['key'];


include 'config/config.php';
$conn = db();
$sql1 = mysqli_query($conn, "ALTER TABLE `cm_feed` DROP `$namekey`");

$sql = mysqli_query($conn, "DELETE FROM ques WHERE q_id = '$namekey'");
if($sql1 && $sql){
  mysqli_close($conn);
  header('Location: subquestion.php');
}
else{
    header('Location: subquestion.php');
}

?>
