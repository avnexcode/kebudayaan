<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:http://localhost/kebudayaan/views/user/login/');
}
$_SESSION = [];
session_unset();
session_destroy();
header('Location:http://localhost/kebudayaan/');
