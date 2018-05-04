<?php

$namekey = $_REQUEST['key'];
$que = $_REQUEST['que'];
include 'config/config.php';
$conn = db();
$sql1 = mysqli_query($conn, "ALTER TABLE `cm_feed` DROP `$que`");
$sql2 = mysqli_query($conn, "ALTER TABLE `if_feed` DROP `$que`");
$sql = mysqli_query($conn, "DELETE FROM ques WHERE q_id = '$namekey'");
if($sql1 && $sql2 && sql2){
  mysqli_close($conn);
  header('Location: question.php');
}
else{
    header('Location: question.php');
}

?>
