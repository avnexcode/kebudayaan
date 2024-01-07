<?php
require("../../../../module/function.php");
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $ethnic = getData("SELECT * FROM ethnics WHERE slug = '$slug'")[0];
    $island_id = $ethnic['island_id'];
    $island = getData("SELECT * FROM islands WHERE id = '$island_id'")[0];
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
    <link rel="stylesheet" href="../../../../src/css/main.css">
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title><?= $ethnic['name'] ?></title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="detail-ethnic">
        <nav>
            <div class="button-back">
                <a href="http://localhost/kebudayaan/views/show/island?slug=<?= $island['slug'] ?>">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="title">
                <h1>Adat dan Budaya</h1>
            </div>
        </nav>
        <header>
            <div class="title">
                <h1><?= $ethnic['name'] ?></h1>
            </div>
            <div class="describe">
                <span>Tari, Alat Musik dan Makanan pada <?= $ethnic['name'] ?></span>
            </div>
        </header>
        <main>
            <div class="table-content">
                <table>
                    <thead>
                        <th>No</th>
                        <th>Tari</th>
                        <th>Alat Musik</th>
                        <th>Makanan</th>
                        </thead>
                    <tbody>
                        <?php
                        $dances = json_decode($ethnic['traditional_dance']);
                        $musics = json_decode($ethnic['musical_instruments']);
                        $foods = json_decode($ethnic['traditional_food']);

                        $maxCount = max(count($dances), count($musics), count($foods));

                        for ($i = 0; $i < $maxCount; $i++) :
                        ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= isset($dances[$i]) ? $dances[$i] : '' ?></td>
                                <td><?= isset($musics[$i]) ? $musics[$i] : '' ?></td>
                                <td><?= isset($foods[$i]) ? $foods[$i] : '' ?></td>
                            </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
</body>

</html>