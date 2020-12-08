<?php
    try {
        $db_path = dirname(__FILE__)
            . DIRECTORY_SEPARATOR . '6a0938148e6fce5f0e7f42561d1ca22a19c939f2f926b386f38e2408d87605f0'
            . DIRECTORY_SEPARATOR . 'sql.db';
        $db = new PDO("sqlite:" . $db_path);
    } catch (PDOException $e) {
        echo 'Exception: No Database!';
        die();
    }
