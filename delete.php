<?php
$id = $_GET['id'];

$pdo = new PDO("mysql:host=127.0.0.1:3307; dbname=test", "root", "root");

$sql = 'DELETE FROM tasks WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();


header('Location: /');