<?php
    // if(!isset($_POST['sign_up'])) {
    //     header('Location: http://localhost/webtechProject/views/login.php');
    // }
    
    include '../user.php';

    $errors = array();
    $queryString = '';
    $username = null; 
    $email = null; 
    $contact_no = null;
    $pwd = null;
    $cpwd = null; 

    if(isset($_POST['sign_up'])) {
        $errors = array();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];
    }
    

    
    if(strlen($username) < 2 || !preg_match("/^[a-zA-Z-' ]*$/",$username)) {
        $queryString .= 'username=false&';
        $errors['username'] = 'Username cannot have white spaces and less than 2 characters';
    }

    if(strlen($contact_no) < 3) {
        $queryString .= 'contact=false&';
        $errors['contact_no'] = 'Contact number cannot have less than 3 numbers';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $queryString .= 'email=false&';
        $errors['email'] = 'Wrong email format';
    }

    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pwd)) {
        $queryString .= 'pwd=false&';
        $errors['pwd'] = 'Password must contain minimum eight characters, at least one letter, one number and one special character';
    }

    if($pwd !== $cpwd) {
        $queryString .= 'cpwd=false&';
        $errors['cpwd'] = 'Both password must match';
    }

    if(empty($username) || empty($email) || empty($contact_no) || empty($pwd) || empty($cpwd)) {
        $queryString .= 'empty=true&';
        $errors['empty'] = 'Please fill up all the forms to sign up';
        header('Location: http://localhost/webtechProject/views/login.php?'.$queryString);
    } else {
        if(count($errors) === 0) {
            $user = new User('customer', $username, $email, $contact_no, '', $pwd, '');
            $msg = $user->save();
            if($msg) {
                header('Location: http://localhost/webtechProject/views/login.php?saved=true');
            } else {
                header('Location: http://localhost/webtechProject/views/login.php?dbError=true');
            }
            
            
        } else {
            header('Location: http://localhost/webtechProject/views/login.php?'.$queryString);
        }
    }

    

?>