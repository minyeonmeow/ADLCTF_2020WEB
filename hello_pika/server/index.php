<?php
function hide($flag) {
    return base64_encode($flag);
}

$flag = "ADLCTF{h3ll0_pika_c00k13}";
setrawcookie('flags', hide($flag), time() + 30, "", "", FALSE, TRUE);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pika pika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/rainbow.css" rel="stylesheet">
    <!-- T3BwcyB5b3UgZm91bmQgbWUuIE5pY2UgdHJ5IQo= -->
</head>
<body>
    <div class="text-center d-flex justify-content-center flex-column" style="height: 100vh">
        <h1><img src="./pika.jpg" width="600" alt="QURMQ1RGe3AxazRfdzB3X3VfQzROX3IzYURfd2U2X1NSYyF9Cg=="></img></h1>
        <p style="font-size: 3em;">
            Say hello to pikachu.<br>
            Pika Pika. 
        </p>
        <span style="visibility:hidden">bmljZSB0cnkhCg==</span>
    </div>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


