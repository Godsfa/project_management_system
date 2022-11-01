<?php 
      // connection to database
      include('db_conn.php');

?>
<html>
    <head>
        <title>Tasks manager</title>
       <link rel="stylesheet" href="general_style.css">

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
       
    <?php 
      // connection to database
      include('sidebar.php');
    ?>
    
       <div class="container" style="border:none; width: 60%;
    height:70% ;
    border:2px solid #20bf6b;
    position: relative;
    left: 4rem;
    top: 3.8rem;">
       <div class="edit-text" style="width:56.9rem;position:relative;left:-0.9rem; bottom:60px;">
             <h3 class="edit">Assign New TASK</h3>
           </div>
        
        <form action="add-task.php" method="POST">
            <div class="whole">
            <table class="tbl-half">
                
                <tr>
                    <td>Tasks Name</td>
                    <td>
                        <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" name="task_name"  placeholder="Type Your Task Name" aria-describedby="addon-wrapping" required>
                        </div>
                </td>
                </tr>
                
                <tr>
                    <td>Task Description</td>
                    <td>
                   
                <div class="input-group">
                <textarea class="form-control" name="task_description" aria-label="Enter Task Description" required></textarea>
                </div>

                </td>
                </tr>

                <tr>
                    <td>Priority: </td>
                    <td>
                        <select name="priority" class="form-select" aria-label="Default select example">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </td>
                </tr>

                <tr>
                        <td>Start Time: </td>
			            <td>
                        <div class="input-group flex-nowrap">
                        <input type="datetime-local" class="form-control" name="start_time" required aria-describedby="addon-wrapping">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>End Time: </td>
			            <td>
                        <div class="input-group flex-nowrap">
                        <input type="datetime-local" class="form-control" name="end_time" required aria-describedby="addon-wrapping">
                        </div>
			            </td>
			        </tr>
                <tr>
                    <td>Assign To: </td>
                    <td>
                      <select name="employee_id" required class="form-select" aria-label="Default select example">
                        <?php
                           $sql2 = "SELECT * FROM tbl_admin WHERE employee_id > 1";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true){
                            while($row2 = mysqli_fetch_assoc($res2)){
                            $user_id = $row2['employee_id'];
                            $user_name = $row2['username'];
                            ?> 
                             <option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
                                <?php
                                    }
                            }else{

                            }
                            ?>
                      </select>
                            </td>

                    </div>
                   </tr>
                <tr>
                    <td>
                      
                        <input type="submit" value="Assign Task" name="submit" class="btn btn-outline-success">
                    </td>
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
        $assign = $_POST['employee_id'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

       $sql2 = "INSERT INTO tbl_tasks SET
            task_name ='$task_name',
            task_description = '$task_description',
            priority = '$priority',
            employee_id = '$assign',
            start_time = '$start_time',
            end_time = '$end_time'
            ";

        $res2 = mysqli_query($conn, $sql2);

         if($res2==true){
            echo '<script>
        alert("Successfully Created")
        window.location.href="index.php"
        </script>';
        }else{
            echo '<script>
        alert("Tasks Creation Failed")
        window.location.href="add-task.php"
        </script>';
        }
    }

?>