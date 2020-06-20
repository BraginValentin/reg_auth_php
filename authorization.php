<?php

// Get data from html form.
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

// Encrypt password.
$hash_password = md5($password);

// Connect to database.
$connect = new mysqli('localhost', 'root', '123', 'mydb');

// Compare data from database.
$result = $connect->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$hash_password'");
$user = $result->fetch_assoc();

if(count($user) == 0)
{
    echo "User not found!";
    exit();
}
else 
{
    // Add new cookies.
    setcookie('user', $user['name'], time() + 3600, "/");
    $connect->close();
    header('Location: /index.php');
}

?>