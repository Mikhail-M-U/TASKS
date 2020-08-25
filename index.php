<?php
//1. Подключиться к БД
$pdo=new PDO("mysql:host=127.0.0.1:3307; dbname=test","root","root");

// 2. Подготовить запрос
$sql = "SELECT * FROM tasks";
$statement = $pdo->prepare($sql); // подготовил запрос
$result=$statement->execute(); //выполнил запрос
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Блокнот</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        <h1> ALL TASKS</h1>
        <a href="create.php" class="btn btn-success"> Add task </a>
        <br></br>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task):?>
                <tr>
                    <th>
                        <?= $task['id']; ?>
                    </th>
                    <th>
                        <?= $task['title'];?>
                    </th>
                    <th>
                        <a href="show.php?id=<?= $task['id']?>" class="btn btn-info"> Show </a>
                        <a href="edit.php?id=<?=$task ['id']?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Вы уверены?');" href="delete.php?id=<?=$task['id']?>" class="btn btn-danger"> Delete</a>
                    </th>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</body>
</html>
