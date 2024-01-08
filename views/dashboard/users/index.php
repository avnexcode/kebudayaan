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

$users = getData("SELECT * FROM users WHERE admin != '1'");

if (isset($_GET["search"])) {
    $users = searchUsers($_GET["search"]);
    $keyValue = $_GET["search"];
} else {
    $keyValue = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../../src/css/main.css">
    <title>User - Dashboard</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="dashboard-page">
        <div class="aside-nav">
            <div class="title">
                <h1>
                    <a href="http://localhost/kebudayaan/">Kebudayaan</a>
                </h1>
            </div>
            <nav>
                <table>
                    <tr>
                        <td><i class="fa-solid fa-comments"></i></td>
                        <td><a href="http://localhost/kebudayaan/views/dashboard/">Comments</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-user"></i></td>
                        <td><a href="http://localhost/kebudayaan/views/dashboard/users/">Users</a></td>
                    </tr>
                </table>
            </nav>
            <div class="sign">
                <table>
                    <tr>
                        <td><i class="fa-solid fa-right-from-bracket"></i></td>
                        <td>
                            <a href="http://localhost/kebudayaan/views/user/logout" class="logout">Logout</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="aside-content">
            <header>
                <h1>Dashboard - Users</h1>
            </header>
            <main>
                <div class="search">
                    <form action="" method="get">
                        <div class="input">
                            <input type="text" placeholder="Cari....." name="search" id="search" value="<?= $keyValue ?>">
                            <button type submit>Search</button>
                        </div>
                    </form>
                </div>
                <table>
                    <thead>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="1">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= strtoupper($value['name']) ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><a onclick="confirmAction('Yakin dihapus?','http://localhost/kebudayaan/views/dashboard/users/delete?id=<?= $value['id'] ?>')"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>

    <script>
        const confirmAction = (text, url) => {
            if (confirm(text)) {
                document.location.href = url
            }
        }
    </script>
</body>

</html>