<?php
session_start();
require("../../../module/function.php");
if (!isset($_SESSION["login"])) {
    header("Location:http://localhost/kebudayaan/views/user/login/");
}
if (isset($_SESSION["auth"])) {
    if (!$_SESSION["auth"]["admin"]) {
        header("Location:http://localhost/kebudayaan/");
    }
}

if (deleteComment($_GET['id']) > 0) {
    echo "
        <script>
            alert('Comment berhasil di hapus')
            document.location.href = 'http://localhost/kebudayaan/views/dashboard/'
        </script>
    ";
} else {
    echo "
        <script>
            alert('Comment gagal di hapus')
            document.location.href = 'http://localhost/kebudayaan/views/dashboard/'
        </script>
    ";
}
