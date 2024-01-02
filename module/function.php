<?php
$connect = mysqli_connect('localhost', "root", "", "pemweb");

function getData($sql) {
    global $connect;
    $data = [];
    $result = mysqli_query($connect, $sql);
    while($rows = mysqli_fetch_array($result)) {
        $data[] = $rows;
    }
    return $data;
}
function removeLocalhost($url) {
    return str_replace('http://localhost/kebudayaan/', '', $url);
}