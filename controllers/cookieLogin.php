<?php 
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

function checkForLogin() {
    if(isset($_COOKIE['uid'])) {
        $user = User::getUserWithId($_COOKIE['uid']);
        session_start();
        $_SESSION['username'] = $user['name'];
        $_SESSION['uid'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];

        $_SESSION['email'] = $user['email'];
        $_SESSION['contact_no'] = $user['contact_no'];
        $_SESSION['location'] = $user['location'];
        $_SESSION['image'] = $user['image'];
    }
}
