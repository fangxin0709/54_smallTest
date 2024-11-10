<?php include_once "db.php";
$sql="delete from `tickets` where `id`='{$_POST['id']}'";
$conn->exec($sql);
header("location:../admin.php");
?>