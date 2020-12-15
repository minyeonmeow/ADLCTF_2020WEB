<?php
require_once("config.php");

//error_log('Connection from bot with cookie: ' . serialize($_COOKIE));

// get one unread message
$sql = "select * from messageboard where is_read=0 limit 1";
$stm = $conn->query($sql)->fetch();
$id = $stm['id'];

if ($stm !== false) {
    // set isread to 1
    $sql = "UPDATE messageboard SET is_read='1' WHERE id='$id'";
    $conn->exec($sql);

    // output message
    echo $stm['message'];
    error_log('READING: [ "' . $stm['message'] . '" ]');
}
?>
