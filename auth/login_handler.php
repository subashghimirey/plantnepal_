<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$users = json_decode(file_get_contents('users.json'), true);

foreach ($users as $user) {
    if ($user['email'] === $email && password_verify($password, $user['password'])) {
        $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];
        header('Location: ../dashboard.php');
        exit;
    }
}

echo "Invalid credentials. <a href='../login.php'>Try again</a>";
