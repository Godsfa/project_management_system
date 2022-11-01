<?php 
      // connection to database
      include('db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];


if(isset($_GET['task_id'])){
    //get the list id value
    $task_id = $_GET['task_id'];

    $sql2 = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true){
        $row2 = mysqli_fetch_assoc($res2);

        $task_name = $row2['task_name'];
        $task_description = $row2['task_description'];
        $priority = $row2['priority'];
        $start_time = $row2['start_time'];
        $end_time = $row2['end_time'];
        $status = $row2['status'];

    }else{
        header('location:manage-list.php');
    }
}

?>

<?php 

// connect to batabase


//write query for all datails
$sql = "SELECT * FROM tbl_tasks";

$result = mysqli_query($conn, $sql);

$details = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<html>
    <head>
        <title>Details</title>
        <link rel="stylesheet" href="general_style.css">
    </head>

    <body>
    <?php 
      // connection to database
      include('sidebar.php');
    ?>
        <div class="wrapper1">
            <div class="container" style=" width: 50%;height:60% ;border:2px solid #20bf6b;position:relative;left: 50px;top: 10px;">
                <div class="whole">
                               
                    <div class="edit-text">
                        <h3 class="edit">Task Details </h3>
                    </div>
                </div>

				<table class="table">
				    <tr>
				        <td>Task Title</td><td><?php echo $task_name; ?></td>
				    </tr>
				    <tr>
				        <td>Description</td><td><?php echo $task_description; ?></td>
				    </tr>
                    <tr>
				    <td>Priority</td><td><?php echo $priority; ?></td>
				    </tr>
				    <tr>
				        <td>Start Time</td><td><?php echo $start_time; ?></td>
				    </tr>
				    <tr>
				        <td>End Time</td><td><?php echo $end_time; ?></td>
				    </tr>
				                     
                    <tr>
                    <td>Status</td>
                        <td><?php  if($row2['status'] == 1){
                            echo "Ongoing";
                        }elseif($row2['status'] == 2){
                        echo "Finished";
                        }elseif($row2['status'] == 3){
                            echo "Cancelled";
                        }else{
                            echo "Started";
                        } ?>
                        </td>
                        </tr>
				        </table>
				               
                    <div>
                    <a href="index.php" class="back" style="text-decoration: none; color: white; border: 3px groove #695210;padding: 13px;background-color: transparent;position: relative;left: 18rem;top: 40px;width: 40%;cursor: pointer;">Go Back</a>
                </div>
            </div>
        </div>
    </body>
</html>