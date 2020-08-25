<?php
$pdo= new PDO("mysql:host=127.0.0.1:3307; dbname=test","root", "root");
$sql= "INSERT INTO tasks (title,content)VALUES (:title, :content)";
$statement=$pdo->prepare($sql);
$statement->execute($_POST);
header("Location:/");
exit;




