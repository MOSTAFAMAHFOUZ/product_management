<?php getFile(FOLDER_PATH."app/checkUser");   ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>PMS</title>
  </head>
  <body>



  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php  url("index"); ?>">PMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php url("index"); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php  url("categories/index"); ?>">Categories</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php  url("products/index"); ?>">Products</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php  url("users/index"); ?>">Users</a>
      </li>
      
    </ul>

    <ul class="navbar-nav mr-right">

      <li class="nav-item">
        <a class="nav-link" href="<?php  url("users/profile"); ?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php  url("logout"); ?>">Logout</a>
      </li>
      
    </ul>
   
  </div>
</nav>