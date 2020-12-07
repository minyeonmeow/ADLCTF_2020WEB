<?php
require_once("config.php");

if(!isset($_COOKIE["USERSESSID"])) {
    setcookie('USERSESSID', md5(uniqid(rand(), true)));
}
$user = $_COOKIE['USERSESSID'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>💬</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="min-height: 100vh;">
    <div id="app" class="container">
        <h1 class="text-center">Message Board</h1>
        <message-board></message-board>
    </div>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>

