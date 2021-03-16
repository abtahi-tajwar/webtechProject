<?php
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/user.php';

$email = null;
$pwd = null;

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $remember = $_POST['remember'];

    $user = User::getUser($email);
    if($user === null) {
        header('Location: http://localhost/webtechProject/views/login.php?loginFailed=true');
    } else {
        if($pwd === $user['password']) {
            session_start();
            $_SESSION['username'] = $user['name'];
            $_SESSION['uid'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            $_SESSION['email'] = $user['email'];
            $_SESSION['contact_no'] = $user['contact_no'];
            $_SESSION['location'] = $user['location'];
            $_SESSION['image'] = $user['image'];

            if($remember === 'on') {
                setcookie('uid', $user['uid'], time() + 86400*7);
            }
            header('Location: http://localhost/webtechProject/index.php?coookie='.$remember);
        }
        else {
            header('Location: http://localhost/webtechProject/views/login.php?loginFailed=true');
        }
        
    }
    
} else {
    header('Location: http://localhost/webtechProject/views/login.php');
}