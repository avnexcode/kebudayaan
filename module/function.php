<?php
$connect = mysqli_connect('localhost', "root", "", "pemweb");

function getData($sql)
{
    global $connect;
    $data = [];
    $result = mysqli_query($connect, $sql);
    while ($rows = mysqli_fetch_array($result)) {
        $data[] = $rows;
    }
    return $data;
}
function removeLocalhost($url)
{
    return str_replace('http://localhost/kebudayaan/', '', $url);
}

function generateUniqueId($prefix = 'id')
{
    $uniqueId = $prefix . uniqid();
    return $uniqueId;
}

function register()
{
    global $connect;
    $id = generateUniqueId();
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordConfirm = htmlspecialchars($_POST['password_confirm']);

    $user = getData("SELECT * FROM users WHERE email = '$email'");

    if ($password !== $passwordConfirm) {
        echo "
            <script>
                alert('password tidak sesuai');
                document.location.href = 'http://localhost/kebudayaan/views/user/register/';
                </script>
                ";
    }
    if ($user) {
        if (strtolower($email) === strtolower($user[0]['email'])) {
            echo "
            <script>
            alert('EMAIL SUDAH TERDAFTAR');
            document.location.href = 'http://localhost/kebudayaan/views/user/register/';
            </script>
            ";
        }
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (id,name,email,password, admin) VALUES ('$id','$name','$email','$password', 'false')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function setComments($user_id)
{
    global $connect;
    $content = htmlspecialchars($_POST["message"]);
    $query = "INSERT INTO comments (user_id, content) VALUES ('$user_id','$content')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function searchComments($key)
{
    $query = "SELECT * FROM comments c JOIN users u ON c.user_id = u.id WHERE u.name LIKE '%$key%' OR u.email LIKE '%$key%' OR c.content LIKE '%$key%'";
    $data = getData($query);
    return $data;
}

function searchUsers($key)
{
    $query = "SELECT * FROM users u WHERE (u.name LIKE '%$key%' OR u.email LIKE '%$key%') AND u.admin != '1'";

    $data = getData($query);
    return $data;
}

function deleteComment($comment_id)
{
    global $connect;
    $query = "DELETE FROM comments WHERE id = '$comment_id'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function deleteUser($user_id) {
    global $connect;
    $query = "DELETE FROM users WHERE id = '$user_id'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}