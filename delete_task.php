<?php
session_start();    
include("config.php");

if(isset($_POST["deleteButton"])){
    $id = $_POST['id'];

    $query = "DELETE FROM `tasks` WHERE `id`='$id'";
    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task deleted successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
}
