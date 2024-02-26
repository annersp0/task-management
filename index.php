<?php session_start();
include ("config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>

  <body>
  <div class="container-fluid mt-4">
    <section class="section">
        <div class="row">
            <div class="col-lg-12" style="padding-left: 30px; padding-right: 30px;">

            <div class="card">
                <div class="card-body">
                <h2 class="card-title" style="font-weight: bold;">TASK MANAGER</h2>

                <a href="create_task.php" style="float: right; " class="btn btn-primary">Add Task</a>
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query = "SELECT * FROM `tasks`";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                    foreach($query_run as $row)
                    {
                    ?>

                    <tr>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['priority']; ?></td>
                    <td><?= $row['due_date']; ?></td>

                    <td class="text-center">

                    <div class="d-flex justify-content">
                    <a type="button" class="btn btn-primary" name="viewButton" style="margin-right: 5px" href="view_task.php?id=<?=$row['id'];?>">
                        <i class="fas fa-eye"></i></a>

                    <a type="button" class="btn btn-warning" name="updateButton"style="margin-right: 5px" href="edit_task.php?id=<?=$row['id'];?>">
                        <i class="fas fa-edit"></i></a>

                    <form action="delete_task.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" name="deleteButton" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </td>
            </tr>

                    <?php
                    } 
                    } else
                    {
                    ?>
                    <tr>
                    <td colspan="6" style="padding: 40px; text-align:center;">Empty task</td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script> 
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
}
?>

</body>
</html>