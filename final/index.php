<?php

  // if(isset($_POST["submit"])){

  // }
  // else
  // header("location: signup_page.php");

  include_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simply Recipes || Final</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- normalize -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- main css -->
    <link rel="stylesheet" href="./css/main.css" />
    <!-- nav css -->
    <link rel="stylesheet" href="./css/nav.css">
  </head>
  <body>
    <!-- nav  -->
    <nav>
      <div class="menu"><i class="fa-solid fa-bars"></i></div>
      <div class="logo"><a href="#">HealthyCo</a></div>
      <div class="nav-items">
          <li><a href="#">Home</a></li>
          <li><a href="#">Recipes</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Profile</a></li>
      </div>
      <div class="cancel"><i class="fa-solid fa-x"></i></div>
      <div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
      <form action="#">
          <input type="search" class="search-recipe" placeholder="Search recipe" required>
          <button type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
  </nav>
    <!-- end of nav -->
    <!-- main -->
    <main class="page">
      <!-- header -->
      <header class="hero">
        <div class="hero-container">
          <div class="hero-text">
            <h1>Your one stop healthy recipe website</h1>
            <h4>Find all the healthy recipes at one place</h4>
          </div>
        </div>
      </header>
      <!-- end of header -->
      <section class="recipes-container">
        <!-- tag container -->
        <div class="tags-container">
          <h4>recipes</h4>
          <div class="tags-list">
            <a href="tag-template.html">Beef (1)</a>
            <a href="tag-template.html">Breakfast (2)</a>
            <a href="tag-template.html">Carrots (3)</a>
            <a href="tag-template.html">Food (4)</a>
          </div>
        </div>
       <!-- end of tag container -->

    <?php
  $query= "SELECT * FROM recipes";
  $query_run= mysqli_query($conn, $query);
  $check_db= mysqli_num_rows($query_run)>0;

  if($check_db){
    while($row=mysqli_fetch_assoc($query_run))
    {
      ?>

        <!-- recipes list -->
        <div class="recipes-list">
          <!-- single recipe -->
          <a href="single-recipe.php" class="recipe">
            <img
              src="./assets/recipes/recipe-1.jpeg"
              class="img recipe-img"
              alt=""
            />
            <h5>Carne Asada</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
        </div>
        <!-- end of recipes list -->
      </section>
      <?php

      }

        }else{
        echo 'Recipes currently unavailable.';
        }

    ?>
    </main>
    <!-- end of main -->
    <script src="./js/app.js"></script>
    <script src="https://kit.fontawesome.com/94945b9beb.js" crossorigin="anonymous"></script>
    <script src="./js/navbar.js"></script>
  </body>
</html>
