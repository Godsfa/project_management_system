<?php 
include('db_conn.php');

session_start();

if(isset($_POST['submit'])){

    $employee_id = $_POST['employee_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];   

    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' && password = '$password' && employee_id = '$employee_id'";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){ 
        $employee_id = $row['employee_id'] ; 
        $num = mysqli_num_rows($result);

    if($num == 1){ 
        echo '<script>
    alert("Login Successful")
    window.location.href="index.php"
    </script>';

    }else{
    echo '<script>
    alert("Either Password Or Username Is inccorect")
    window.location.href="login.php"
    </script>';
    } 
}
    $sql2 = "SELECT * FROM tbl_admin WHERE employee_id = $employee_id";
    $res2 = mysqli_query($conn, $sql2);
    while( $row = mysqli_fetch_assoc($res2)){
        $count_rows = mysqli_num_rows($res2);
        if($count_rows>0){
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['login_id'] = $row['login_id'];

       header('location:index.php');
    }
   }
    
}
?>