<?php

$data = [
    "id"    =>  $_GET['id'],
    "title" =>  $_POST['title'],
    "content"   =>  $_POST['content']
];

$pdo = new PDO("mysql:host=127.0.0.1:3307;dbname=test", "root", "root");
$sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute($data); // true || false

header("Location: /"); exit;