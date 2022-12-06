<?php
$id = $_GET['id'];
include_once "functions/database.php";
$connect = config();
$result = $connect->prepare("DELETE FROM category WHERE id = ?");
$result->bindParam(1 , $id);
$result->execute();
header("location: dashboard.php?m=categories&p=list&deleteisdone");