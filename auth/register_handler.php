<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$dataFile = 'users.json';
$users = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

foreach ($users as $user) {
    if ($user['email'] === $email) {
        die("User already exists. <a href='../register.php'>Try again</a>");
    }
}

$users[] = ['name' => $name, 'email' => $email, 'password' => $password];
file_put_contents($dataFile, json_encode($users, JSON_PRETTY_PRINT));

$_SESSION['user'] = ['name' => $name, 'email' => $email];
header('Location: ../dashboard.php');
