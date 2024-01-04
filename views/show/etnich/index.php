<?php
require("../../../module/function.php");
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $island = getData("SELECT * FROM islands WHERE slug = '$slug'")[0];
    $island_id = $island['id'];
    $ethnics = getData("SELECT * FROM ethnics WHERE island_id = '$island_id'");
} else {
    header("Location: http://localhost/kebudayaan");
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
    <title><?= $island['name'] ?> - Kebudayaan</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="show-etnich">
        <h1>Suku di Pulau <?= $island['name'] ?></h1>
        <ul>
            <?php foreach ($ethnics as $key => $value) : ?>
                <li><?= $value['name'] ?></li>
                <li><?= $value['describe'] ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>

</html>