<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = trim($_POST['pass']);

$pass = md5($pass . "paramSalt");

$connectDb = new mysqli ('a_level_nix_mysql', 'root', 'cbece_gead-cebfa', 'register-db');
$result = $connectDb->query("SELECT * FROM `users` WHERE `user_login` = '$login' AND `user_pass` = '$pass' ");
$user = $result->fetch_assoc();

if (!isset($user)) {
    echo "такой пользователь не найден";
    exit();
}


setcookie('user', $user['user_name'], time() + 3600, "/" );


header('Location: /index.phtml');

