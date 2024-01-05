<?php
require("../../../../module/function.php");
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $ethnic = getData("SELECT * FROM ethnics WHERE slug = '$slug'")[0];
} else {
    header("Location: http://localhost/kebudayaan");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ethnic['name'] ?></title>
</head>

<body>
    <section id="detail-ethnic">
        <h1>Musik</h1>
        <ul>
            <?php foreach (json_decode($ethnic['musical_instruments']) as $key => $value) : ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>
        <h1>Tari</h1>
        <ul>
            <?php foreach (json_decode($ethnic['traditional_food']) as $key => $value) : ?>
                <li><?= $value ?></li>

            <?php endforeach ?>
        </ul>
        <h1>Makanan</h1>
        <ul>
            <?php foreach (json_decode($ethnic['traditional_dance']) as $key => $value) : ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>
    </section>
</body>

</html>