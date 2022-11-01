<?php 

// connection to database
include('db_conn.php');
include('verify.php');

$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];

    //check if the list_id is assigned or not
    if(isset($_GET['task_id'])){
        $task_id = $_GET['task_id'];
        $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = '';
             header('location:index.php');
        }else{
           $_SESSION['delete_fail'] = '';
           header('location:index.php');
        }
    }else{
        header('location:index.php');
    }

   

?>