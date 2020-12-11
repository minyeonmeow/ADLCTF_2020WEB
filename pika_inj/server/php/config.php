<?php
    try {
        $folder = dirname(__FILE__) . DIRECTORY_SEPARATOR
            . '6a0938148e6fce5f0e7f42561d1ca22a19c939f2f926b386f38e2408d87605f0';
        $user_db = new PDO("sqlite:" . $folder . DIRECTORY_SEPARATOR . 'user.db');
        $ban_db = new PDO("sqlite:" . $folder . DIRECTORY_SEPARATOR . 'banned.db');
    } catch (PDOException $e) {
        die($e);
    }
