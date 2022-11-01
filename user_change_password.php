<?php 
      // connection to database
      include('db_conn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_admin WHERE employee_id >1";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $row = mysqli_fetch_assoc($res);
            $old_password = $row['password'];         
    }

}else{
    header('location:update_user.php');
}

?>
<html>
    <head>
        <title>administation page</title>
        <link rel="stylesheet" href="user_style.css">
        <style>
        .list2{
        background-color: #695210 ;
        width: 50%;
        height: 47px;
        position: relative;
        left: 75px;
        bottom: 10px;
        text-align: center;
        list-style: none;
      }
      .list1{
        position: relative;
        left: 100px;
        bottom: 10px;
        list-style: none;
      }
      .nav-content{
        position: relative;
        top: 8px;
      }
      hr{
        bottom: 11px;
        position: relative;
        left: 224.5px;
      }
        </style>
    </head>
    <body>
        <?php 
            include('sidebar.php');
          ?>
        <div class="wrapper">
        
          <div class="gap">
          <div class="responsive">
            <div class="h3">Change Password</div>
            <form class="input" method="POST">
                     <label for="">Old Password</label>
                <div>
                    <input type="password" name="old_password" value="<?php echo $old_password; ?>">
                </div>
                    <label for="">New Password</label>
                <div>
                    <input type="password" name="new_password" value="">
                </div>
                    <label for="">Confirm New Password</label>
                <div>
                    <input type="password" name="comfirm_password" value="">
                </div>
        
                <input type="submit" value="Change" class="update" style="bottom:70px; left:500px ;" name="submit">

                <a href="update_user.php" class="update" style="bottom:70px; left:500px; text-decoration: none; color: white;">Go Back</a>
            </form>

            </div>
          </div>
        </div>
    </body>
</html>

<?php 
 
    if(isset($_POST['submit'])){

            $new_password = $_POST['new_password'];
            $comfirm = $_POST['comfirm_password'];
                
            if($new_password==$comfirm){

                 $sql3 = "UPDATE tbl_admin SET

                password = '$comfirm'
                WHERE
                employee_id > 1
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true){
                    echo '<script>
                    alert("Password Changed")
                    window.location.href="update_user.php"
                    </script>';
                }else{
                    echo '<script>
                    alert("failed To Change Pasword")
                    window.location.href="user_change_password.php"
                    </script>';
                }
            }
       
    }

?>