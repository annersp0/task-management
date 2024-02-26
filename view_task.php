<?php
session_start();
include("config.php");

if(isset($_GET['id']))
    $id = $_GET['id'];

    $query = "SELECT * FROM `tasks` WHERE `id`='$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $task = mysqli_fetch_assoc($result);
        $title = $task['title'];
        $description = $task['description'];
        $priority = $task['priority'];
        $due_date = $task['due_date'];
    } else {
        echo "Task not found!";
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4" style="font-weight: bold">Task Details</h1>
        <div class="row justify-content-center">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="font-weight=bold;"><?= $title; ?></h3>
                        <p class="card-text"><?= $description; ?></p>
                        <p class="card-text"><strong>Priority:</strong> <?= $priority; ?></p>
                        <p class="card-text"><strong>Due Date:</strong> <?= $due_date; ?></p>
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                    <a href="index.php" class="btn btn-primary" name="backButton" style="margin-right: 10px">Back</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
