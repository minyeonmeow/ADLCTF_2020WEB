<?php
    $flag = "ADLCTF{md55um_l0053_c0mp4r150n5}";
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    if (!isset($user) || !isset($pass)) {
        header('Location', "./secret.html");
    } else {
        if ($user == "pikachu" && md5($pass) == "0e481756596645574257920728035178") {
            $text = $flag;
        } else {
            $text = "PIKA PIKA.";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PIKA PIKA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/rainbow.css">
</head>
<body style="height: 100vh;">
    <div class="text-center d-flex align-items-center justify-content-center" style="height: 100%">
        <h1 class="rainbow"><?php echo $text;?></h1>
    </div>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
