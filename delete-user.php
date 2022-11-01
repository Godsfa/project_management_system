<?php 
      // connection to database
      include('db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];

    //check if the list_id is assigned or not
    if(isset($_GET['employee_id'])){
        $employee_id = $_GET['employee_id'];
        $sql = "DELETE FROM tbl_admin WHERE employee_id=$employee_id";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = '';
             header('location:manage-user.php');
        }else{
           $_SESSION['delete_fail'] = '';
           header('location:manage-user.php');
        }
    }else{
        header('location:manage-user.php');
    }

   

?>