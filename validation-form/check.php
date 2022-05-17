<?php


$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = trim($_POST['pass']);


if (mb_strlen($login) < 5 || mb_strlen($login) > 30) {
    echo "Длина логина не допустимая";
    exit();
} elseif (mb_strlen($name) < 3 || mb_strlen($name) > 20) {
    echo "Длина имени не допустимая";
    exit();
} elseif (mb_strlen($pass) < 7 || mb_strlen($pass) > 20) {
    var_dump($pass);
    echo "Длина пароля не допустимая(не менее 7 и не более 20)";
    exit();
}
$pass = md5($pass . "paramSalt");

$connectDb = new mysqli ('a_level_nix_mysql', 'root', 'cbece_gead-cebfa', 'register-db');
$connectDb->query("INSERT INTO `users` (`user_login`, `user_name`, `user_pass`) VALUES ( '$login', '$name', '$pass')");
$connectDb->close();

header('Location: /index.phtml');
