<?php include_once "db.php";
$sql="select * from `tickets` where `id`='{$_GET['id']}'";
$row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);