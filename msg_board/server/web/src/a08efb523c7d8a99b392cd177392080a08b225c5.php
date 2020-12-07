<?php
require_once("config.php");

// get one message
$sql = "select * from messageboard where is_read=0 limit 1";
$stm = $conn->query($sql)->fetch();
$id = $stm['id'];

// set isread to 1
$sql = "UPDATE messageboard SET is_read='1' WHERE id='$id'";
$conn->exec($sql);

// output message 
echo $stm['message'];
?>
