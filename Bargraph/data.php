<?php
//Setting header to json
header('Content-Type: application/json');

//database calling
require_once '..\config/config.php';
$conn = db();

//query to get data from table
$query = sprintf("SELECT * FROM cm_feed");

$result = $conn->query($query);

//loop through the data
$data = array();
foreach($result as $row){
    $data[] = $row;
}

$result->close();
$conn->close();

print json_encode($data);
?>