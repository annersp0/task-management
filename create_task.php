<?php
session_start();
include("config.php");

if (isset($_POST["insertButton"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $query = "INSERT INTO `tasks` (`title`, `description`, `priority`, `due_date`) VALUES ('$title', '$description', '$priority', '$due_date')";
    $query_result = mysqli_query($con, $query);

    if ($query_result) {
        $_SESSION['status'] = "Task added successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
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
    <style>
    .insert-task-heading {
        text-align: center;
        font-weight: bold;
        padding-top: 20px; 
    }
    </style>
</head>

<body>
<div class="container mt-8"><h1 style="text-align: center; font-weight: bold; padding-top: 20px;">Create Task</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="priority" class= form-label>Priority:</label>
                        <select class="form-control" id="priority" name="priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date">
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <button type="submit" class="btn btn-primary" name="insertButton">Add</button>
                        <a href="index.php" class="btn btn-danger" name="cancelButton" style="margin-right: 5px">Cancel</a>
                    </div>
      
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>