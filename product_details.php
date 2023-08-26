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
    <link rel="stylesheet" href="./CSS/product_details.css">
    <style>
          
    </style>

</head>
<body>
    <!--  navbar  -->
    
    <div class="conainer-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <img src="./Images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" id="" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav mx-3">
      
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
          <li> 
            <?php  
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

<!-- fourth child -->
<div class="row px-1 my-5">

  <div class="col-md-12">

    <!-- products -->
    <div class="row my-5">
        

        
      <!-- fetching products -->

<?php  
    // calling function
    view_details();
    get_unique_categories();
    get_unique_brands();
?>
           
    </div>
  </div>
</div>

<!-- last child -->
    <!-- footer start -->


  <footer>
    <?php
    include("./includes/footer.php");
    ?>
    </footer>

<!-- footer end  -->

    </div>


<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>