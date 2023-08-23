<?php  
    // connect file
    include('./includes/connect.php');
    include('./functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL.</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="./CSS/style.css">
    <style>
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;   
}
.logo{
    width: 7%;
    height: 7%; 
} 
/* Product page sidenavbar  */
.side-navbar{
margin:0;
background-color:#fff;
height: 50px;
}
.side-navbar .left-content{
    background-color: #72cc50;
    margin-top: 20px;
   margin-left: 65px;
}

.side-navbar .left-content h4 {
    color:#fff;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    padding:10px;
    text-align: center;

}
.side-navbar .left-content li {
display: inline-block;
padding: 5px;
margin-top:10px;
}
.side-navbar  li, a{
  color:#fff;
}



/* show the categories start */
.side-navbar .right-content{
    background-color: #75ce9f;
    margin-top: 20px;
   margin-left: 65px;
}

.side-navbar .right-content h4 {
    color:#fff;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    padding:10px;
    text-align: center;

}
</style> 

</head>
<body>
    <!--  navbar  -->
    
    <div class="conainer-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
  <img src="./Images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Total price: <?php total_cart_price(); ?>/-</a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" id="" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
      
      <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
          }


        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='users_area/user_login.php'>Login</a>
      </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='users_area/logout.php'>Logout</a>
      </li>";
        }
      ?>
  </ul>
</nav>

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center text-success">Mission-Dhanwantri</h3>
  <p class="text-center text-success">Women Empowerment Through Herbs </p>
</div>

<!-- sidenavbar -->
<div class="side-navbar">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="left-content">
        <h4> Self Help Groups </h4> 
      
        <!-- display The self help groups -->
        <ul>
          <li> <?php  
        getbrands();
        ?></li>
        </ul>
        </div>
        </div>
        
        
        <div class="col-md-8">
        <div class="right-content">
             <h4> Categories </h4> 
        
        <ul>
        <?php  
          getcategories(); 
        ?>
        </ul>
      </div>
        </div>
     </div>
  </div>
  </div>

<!-- product start -->
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
      <div class="section-heading"> 
        <h2> Latest Products </h2>
      </div>
    </div>
    <div class="col-md-12">
     <div class="row g-3">
     <?php  
    // calling function
    get_all_products();
    get_unique_categories();
    get_unique_brands();
      ?>
     </div>
    </div>
</div>
</div>


<!-- last child -->
    <!-- include footer -->
    <footer>
    <?php
    include("./includes/footer.php");
    ?>
    </footer>
    
    </div>
     


<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>