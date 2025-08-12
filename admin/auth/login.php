<?php
session_start();
if (!isset($_POST['username']) || !isset($_POST['password']) || strlen($_POST['username']) < 1 || strlen($_POST['password']) < 1) {
    //http_response_code(404);
    echo json_encode(['msg' => 'Missing required fields']);
    return;
}

$username = $_POST['username'];
$password = $_POST['password'];
require_once '../libs/session.php';
require_once '../libs/database.php';
require_once './User.php';
$user = new User();

$user = $user->findByUsername($username);

if (!$user) {
    //http_response_code(404);
    echo json_encode(['msg' => 'No user found']);
    return;
}

if (!password_verify($password, $user->password)) {
    //http_response_code(401);
    echo json_encode(['msg' => 'Invalid username or password']);
    return;
}

Session::set('auth', true);
Session::set('username', $user->username);

http_response_code(200);
echo json_encode(
    ['status' => 'success', 'user' => $user]
);