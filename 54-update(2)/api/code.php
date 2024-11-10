<?php
session_start();
$_SESSION['code']=rand(1000,9999);
echo $_SESSION['code'];
?>