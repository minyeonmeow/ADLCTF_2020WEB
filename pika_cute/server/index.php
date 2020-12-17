<?php
include('pika.php');

$pika = new Pikachu();
$pika->set_cookie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pika-pika pikachuchu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="all">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>
	<img src=pika_img/pikaface.gif width=250>
        皮卡丘語翻譯機
	</h1>
    </div>
</div>
<div class="container">
    <div class="navbar">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="./index.php">Home</a>
                </li>
                <li>
                    <a href="http://ctf.adl.tw:12003?skill=skill/Thunder.php">十萬伏特</a>
                </li>
                <li>
                    <a href="http://ctf.adl.tw:12003?skill=skill/QuickAttack.php">電光一閃</a>
                </li>
                <li>
                    <a href="http://ctf.adl.tw:12003?skill=skill/Tail.php">鋼鐵尾巴</a>
                </li>
            </ul>
	    <marquee scrollamount="10">"Pika-pika pikachu"的意思是"我叫皮卡丘"</marquee>
            <h3>
                <?php
                $file = $_GET['skill'];
                if (isset($file)){
    	            include($file);
    	        }
                else {
                    include('pika_img/index.html');
                }
                ?>
            </h3>
	</div>
    </div>
    <h2><font color="white">hint: LFI</font></h2>
</div>
</body>
</html>
<marquee scrollamount=15><img src=pika_img/dancepika.gif width=200></img></marquee>
<img src=upload.html width=0 height=0>
