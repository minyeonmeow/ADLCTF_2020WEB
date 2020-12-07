<?php
    try {
        $db_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sql.db';
        $db = new PDO("sqlite:" . $db_path);
    } catch (PDOException $e) {
        echo 'Exception: No Database!';
        die();
    }


    