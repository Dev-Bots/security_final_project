<?php

@include 'config.php';
//@include 'dbcon.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <a href="logout.php" class="btn">logout</a>
      </form>
    </div>
  </div>
</nav>



<div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="content">
                    <h3>Hi, <span>Admin</span></h3>
                    <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
                    <p>ADMIN PAGE</p>
      
                        </div>
                        <h4>Complain Details 
                            <a href="admin_page.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $complain_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM user_form INNER JOIN user_comment ON user_comment.id='$complain_id' WHERE user_comment.f_id= user_form.id";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $problem = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <p class="form-control">
                                            <?=$problem['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <p class="form-control">
                                            <?=$problem['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email Address</label>
                                        <p class="form-control">
                                            <?=$complain_id;?>
                                        </p>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label>Comment</label>
                                        <p class="form-control">
                                            <?=$problem['comment'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>File</label>
                                        <p class="form-control">
                                            <?=$problem['fname'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Status</label>
                                        <p class="form-control">
                                            <?=$problem['status'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
