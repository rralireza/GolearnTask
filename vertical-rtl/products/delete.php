<?php
$id = $_GET['id'];
include_once "functions/database.php";
$connect = config();
$result = $connect->prepare("DELETE FROM products WHERE id = ?");
$result->bindParam(1 , $id);
$result->execute();
header("location: dashboard.php?m=products&p=list&deletedone");