<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
        .nav-link{
            color: #fff !important;
        }
        .navbar-toggler{
            background-color: #fff !important;
        }
        .navbar-nav{
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            margin: auto !important;
        }
        .nav-item{
            margin: 0 20px;
            width: 100px;
        }
        .nav-link{
            background-color: #A9A9A9 !important;
            color: #fff !important;
            text-align:center;
            border-radius: 5px;
        }
        .nav-link:hover{
            background-color: #fff !important;
            color: #000 !important;
        }
        .headerText{
          color: #fff;
        }
    </style>
</head>
<body>
<main>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
      <?php
        session_start();
        if(isset($_SESSION['emailAddress'])){
          echo '<ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="adminpdf.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="edit.php">List</a>
          </li>
        </ul>';
        echo "Hi, ".$_SESSION['emailAddress']." <a href='./admin/logout.php' class='headerText'>Logout</a>";
        } else {
          echo '<span class="headerText">Please Login</span>';
        }       
      ?>
      
    </div>
  </div>
</nav>   
</main>