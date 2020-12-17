<?php
function RandomString()
{
    $characters = '0123456789abcdeghijklmnopqrstuvwxyzABCDEGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

header('Location:/');

if ($_FILES["my_file"]["error"] > 0)
{
    echo "Error: " . $_FILES["my_file"]["error"];
}
else
{
    $file_name = RandomString();

    if(move_uploaded_file($_FILES["my_file"]["tmp_name"], "./upload/".$file_name.'.jpg')){
         require_once('pika.php');
         $data = unserialize(base64_decode($_COOKIE['sth']));

         if ($data->g === "get" && $data->f === array('file', 'name')){
             setrawcookie('f', $file_name, time()+60, "", "", false, true);
         }
    }
}
?>
