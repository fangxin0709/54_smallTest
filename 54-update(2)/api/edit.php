<?php include_once "db.php";
$sql="update `tickets` set `first_name`='{$_POST['first_name']}',`last_name`='{$_POST['last_name']}',`phone`='{$_POST['phone']}',`password`='{$_POST['password']}' where `id`='{$_POST['id']}'";
$conn->exec($sql);
header("location:../admin.php");
?>