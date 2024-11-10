<?php include_once "db.php";
// header('Content-type:Application/json');
// $sql="select * from `station` ORDER BY `minute` DESC";
// $row=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// $hi = [
//     "bus"=>"AUTO-1234",
//     "participants"=>$row,
// ];
// echo json_encode($hi,JSON_UNESCAPED_UNICODE);
// ASC 升冪 DESC 降冪 ORDER BY ``是以定義的那列排序
$sql="select * from `tickets` where `id`='{$_GET['id']}'";
$row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);