<?php
// include './api/db.php';
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';
// $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
// $result = $pdo->query($sql)->fetch();
// if (empty($result)) {
//     echo $result;
// } else {
//     $_SESSION['username'] = $username;
//     echo $result;
// }
// echo $_GET['username'].$_GET['password'];
var_dump($_GET);