<?php 

    include('db_conn.php');

    if(isset($_GET['task_id'])){
        $task_id = $_GET['task_id'];

        $sql1 = "SELECT * FROM tbl_tasks WHERE task_id = $task_id";

        $res1 = mysqli_query($conn, $sql1);

        if($res1==true){
            $row = mysqli_fetch_assoc($res1);
            
                $task_name = $row['task_name'];
                $task_description = $row['task_description'];
                $priority = $row['priority'];
                $start_time = $row['start_time'];
                $end_time = $row['end_time'];
                $status = $row['status'];
                $employee_id = $row['employee_id'];
        }
    }else{
        echo '<script>
        alert("Failed")
        window.location.href="home.php"
        </script>';
    }
?>

<html>
    <head>
        <title>Tasks Manager</title>
        <link rel="stylesheet" href="general_style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>

    <?php 
  
        include('sidebar.php');
    ?>
            <div class="container" style="border:none ;">

           <div class="edit-text" style="width:60%;position:relative;left:6.25rem; bottom:45px;">
             <h3 class="edit">EDIT TASK</h3>
           </div>

    <form action="update-task.php" method="POST">
    <div class="whole" style="width: 60%;position:relative;left:100px;top:-3rem;border:2px groove #20bf6b;">
    <table class="tbl-half">
    <tr>
    <td>Task Name: </td>
    <div class="input-group flex-nowrap">
    <td><input type="text" name="task_name" class="form-control"  aria-describedby="addon-wrapping" value="<?php echo $task_name ?>" required></td>
    </div>
    </tr>
    
    <tr>
    <td>Task Descripton: </td>
    <td>
    <div class="input-group">
    <textarea name="task_description" class="form-control" required><?php echo $task_description ?></textarea>
    </div>
    </td>
    </tr>

    <tr>
      <td>Priority: </td>
        <td>
       <select name="priority"  class="form-select" aria-label="Default select example">
       <option <?php if($priority=="High"){
         echo "selected ='selected'";
          } ?> value="High">High</option>

        <option <?php if($priority=="Medium") {
         echo "selected='selected'";
        } ?> value="Medium">Medium</option>

        <option <?php if($priority=="Low") {
         echo "selected='selected'";
        } ?>  value="Low">Low</option>
    </select>
    </td>                
    </tr>

    <tr>
        <td>Start Time: </td>

        <div class="input-group flex-nowrap">
        <td><input type="datetime-local" name="start_time" class="form-control" value="<?php echo $start_time ?>"></td>
        </div>
    </tr>

    <tr>
        <td>End Time: </td>
        <div class="input-group flex-nowrap">
        <td><input type="datetime-local" name="end_time" class="form-control" value="<?php echo $end_time ?>"></td>
        </div>
    </tr>
 <tr>
		<td>Status: </td>
        <td>
        <select class="form-select" aria-label="Default select example" name="status">
		    <option value="0" <?php if($row['status'] == 0){ ?>selected <?php } ?>>Started</option>
			<option value="1" <?php if($row['status'] == 1){ ?>selected <?php } ?>>Ongoing</option>
            <option value="2" <?php if($row['status'] == 2){ ?>selected <?php } ?>>Finished</option>
            <option value="3" <?php if($row['status'] == 3){ ?>selected <?php } ?>>Cancelled</option>               
        </select>
        </td>
    </tr>

        <tr>
            <td>Assign To</td>
            <td>

            <?php
             $sql2 = "SELECT * FROM tbl_admin WHERE login_id = 2";

            $res2 = mysqli_query($conn, $sql2);
            ?>

            <select  class="form-select" aria-label="Default select example" name="users" <?php if($employee_id = 2)?>>
            <option value="">Select</option>
            
                <?php while($rows = mysqli_fetch_assoc($res2)){ ?>
                    <option value="<?php echo $rows['employee_id']; ?>" <?php
                        if($rows['employee_id'] == $row['employee_id']){
                     ?> selected <?php } ?>><?php echo $rows['username']; ?></option>
                    <?php } ?>
                    
            </select>
            </td>
        </tr>

    <tr>
       <td><input type="submit" value="Update"  class="btn btn-outline-success" style="width:8rem;position:relative;left:33rem" name="submit"></td>
    </tr>

    </table>
    </div>
    </form>
    
</div>
</div>
</body>
</html>

<?php

if(isset($_POST['submit'])){

   $task_name = $_POST['task_name'];
   $task_description = $_POST['task_description'];
   $priority = $_POST['priority'];
   $start_time = $_POST['start_time'];
   $end_time = $_POST['end_time'];
   $status = $_POST['status'];
   $users = $_POST['users'];

    $sql3 = "UPDATE `tbl_tasks` SET `task_name`='$task_name',`task_description`='$task_description',`priority`='$priority',`start_time`='$start_time',`end_time`='$end_time',`status`='$status',`users`='$users' WHERE task_id = $task_id";

    $res3 = mysqli_query($conn, $sql3);

    if($res3==true){
        echo '<script>
        alert("Task Successfully Assigned")
        window.location.href="index.php"
        </script>';
    }else{
        echo '<script>
        alert("failed To Assign Task")
        window.location.href="update-task.php"
        </script>';
    }
}

?>