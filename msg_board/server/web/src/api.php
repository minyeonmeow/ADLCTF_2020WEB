<?php
require_once("config.php");

$user = $_COOKIE['USERSESSID'];
if (!isset($user) && !empty($user)) {
    echo json_encode(['status' => 0, 'msg' => 'Who are you?', 'data' => null]);
    die();
} 

$method = $_GET['method'];
if (!isset($method) && !in_array($method, ['send', 'recv'])) {
    echo json_encode(['status' => 0, 'msg' => 'Bad requests!', 'data' => null]);
    die();
} else {
    if ($method === 'send') {
	$message = $_POST['message'];
        if(isset($message) && !empty($message)) {
            $sth = $conn->prepare("INSERT INTO messageboard(`session_id`, `message`) VALUES (?, ?)");
            $result = $sth->execute([$user, $message]);
	    if ($result !== false) {
		$id = $conn->lastInsertId();
		$sth = $conn->prepare("SELECT * FROM messageboard WHERE `id` = ?");
                $sth->execute([$id]);
                $result = $sth->fetchAll();;
                echo json_encode(['status' => 1, 'msg' => null, 'data' => $result]);
                die();
            } else {
                echo json_encode(['status' => 0, 'msg' => 'Add message failed!', 'data' => null]);
                die();
            }
        } else {
            echo json_encode(['status' => 0, 'msg' => 'Empty message!', 'data' => null]);
            die();
        }
    } else {
        $sth = $conn->prepare("SELECT `time`, `message`, `is_read` FROM `messageboard` WHERE `session_id` = ?");
        $result = $sth->execute([$user]);
        if ($result) {
            echo json_encode(['status' => 1, 'msg' => null, 'data' => $sth->fetchAll()]);
            die();
        } else {
            echo json_encode(['status' => 0, 'msg' => 'Can not get any data!', 'data' => null]);
            die();
        }
    }
}
