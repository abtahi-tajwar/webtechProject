<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject'; 
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/cookieLogin.php';
require $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/json.php';

$session_exists = false;    
if(isset($_SESSION['username'])) {
    $session_exists = true;
}

if(!$session_exists) {
    checkForLogin();    
}

//Retreiving json data
$data = getJSONData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'] ?></title>
</head>
<body>
    <center>
        <header>
            <?php if($session_exists) {
                if($_SESSION['role'] !== 'customer') {
                    echo '<td><a href="'.$path.'/views/backend/dashboard.php">Go to dashboard</a></td>';
                } 
            }                       
            ?>
            <!-- <a href="<?php echo $path.'/views/backend/dashboard.php'; ?>">Go to dashboard</a> -->
            <table width="1000px">                
                <td colspan="3"><h1><?php echo $data['name'] ?></h1></td>
                <td><a href="<?php echo $path ?>">Home</a></td>
                <td><a href="<?php echo $path.'/views/menu.php'; ?>">Menu</a></td>
                <td><a href="">Cart (0)</a></td>
                <?php
                if($session_exists) {
                    echo '<td><a href="'.$path.'/views/editProfile.php">'.$_SESSION['username'].'</a></td>';
                    echo '<td><a href="'.$path.'/controllers/handlers/handleLogout.php">Logout</a></td>';
                } else {
                    echo '<td><a href="'.$path.'/views/login.php">Sign In/Sign Up</a></td>';
                }
                ?>                
            </table>
        </header>
    </center>
