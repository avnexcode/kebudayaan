<?php 
require("../../../module/function.php");
if(isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $island = getData("SELECT * FROM islands WHERE slug = '$slug'")[0];
} else {
    header("Location: http://localhost/kebudayaan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $island['name'] ?></title>
</head>
<body>
    
</body>
</html>