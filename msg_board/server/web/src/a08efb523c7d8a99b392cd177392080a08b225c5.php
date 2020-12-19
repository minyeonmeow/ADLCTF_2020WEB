<?php
require_once("config.php");

// prevent others from connecting
if (preg_match('/^192\.168\./', $_SERVER['REMOTE_ADDR']) === 0) {
    die();
}

// get one unread message
$sql = "SELECT * FROM messageboard WHERE is_read = 0 LIMIT 1";
$stm = $conn->query($sql)->fetch();
$id = $stm['id'];

if ($stm !== false) {
    // set isread to 1
    $sql = "UPDATE messageboard SET is_read = '1' WHERE id = '$id'";
    $conn->exec($sql);

    // output message
    echo $stm['message'];
    error_log('READING: [ "' . $stm['message'] . '" ]');
}
?>
