<?php

// Get data from html form.
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 100) 
{
    echo "invalid login length!";
    exit();
}
elseif (mb_strlen($name) < 4 || mb_strlen($name) > 50)
{
    echo "invalid name lenght!";
    exit();
}
elseif (mb_strlen($password) < 5 || mb_strlen($password) > 10)
{
    echo "invalid password lenght!";
    exit();
}

// Encrypt password.
$hash_password = md5($password);

// Connect to database.
$connect = new mysqli('localhost', 'root', '123', 'mydb');
$connect->query("INSERT INTO `users` (`login`, `name`, `password`)
VALUES ('$login', '$name', '$hash_password')");

$connect->close();
header('Location: /index.php');

?>