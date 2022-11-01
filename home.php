<?php 
      // connection to database
      include('db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];
?>

<html>
    <head>
        <title>Project Manager System</title>
        <link rel="stylesheet" href="home_style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body class="body">

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav">
        <button class="btn btn-outline-warning pages">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        </button>
        <button class="btn btn-outline-warning pages">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="add-task.php">Create New Task</a>
        </li>
        </button>     
        <button class="btn btn-outline-warning pages">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">View Task</a>
        </li>
        </button> 
        <?php if($login_id == 1){ ?>
            <button class="btn btn-outline-warning pages">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="administation.php">Administation</a>
            </li>
            </button>
            <?php } ?>    
        
        
      </ul>
    </div>
  </div>
</nav>

<div class="container container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="h2 text">PROJECT MANAGEMENT SYSTEM</div>
            <div class="h4 text">Making Collaborative Work Esay</div>
            <button type="button" class="btn btn-outline-warning get_started"><a href="user_login.php" class="a">Get Sarted</a></button>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="images__1_-removebg-preview.png" alt="image">           
        </div>
    </div>
</div>

        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>