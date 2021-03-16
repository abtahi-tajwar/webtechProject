<?php
session_start();
session_destroy();

header('Location: http://localhost/webtechProject/index.php');