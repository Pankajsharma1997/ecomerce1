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

    <!-- icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- css file -->
    <link rel="stylesheet" href="./CSS/style.css">

    <style>

      body{
        overflow-x: hidden;
      }
      .logo{
    width:7%;
    height:7%;
}
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
                <a class="nav-link" href="about.php">About Us</a>
              </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li> 

        <?php
            if(isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='users_area/profile.php'>My Account</a>
              </li>";
            }else{
              echo "<li class='nav-item'>
                <a class='nav-link' href='users_area/user_registration.php'>Register</a>
              </li>";
            }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
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
      </div>

<!-- banner start
<div class="banner-about"> 
<!-- <img src="./Images/camomile tea.jpg" class="card-img-top" alt="..."> -->
    <!-- <div class="text-content"> 
        <h4> Mission-Dhanwantri  </h4>
        <h3> Women Empowerment Through Herbs </h3>
    </div> -->
<!-- </div> --> 
<!-- banner end -->

<!-- crousel start -->

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="./Images/Camomile flower.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="./Images/ginger tea.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./Images/nature.jpg" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item">
      <img src="./Images/sp2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./Images/tulsi1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- crousal end -->



<!-- product start -->
<div class="latest-products">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-12"> 
      <div class="section-heading"> 
        <h2> Latest Products </h2>
      </div>
    </div>

    <?php  
    // calling function
    getproducts();
   
?>

   <div class="col-md-4">
    <div class="card">
      <img src="./Images/sarpghandha1.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Sarpgandha</h5>
        <p class="card-text">Sarpgandha is a medical plant that the roots and seeds are used to medical use.</p>
        <a href="#" class="btn btn-primary">Buy Now</a>
      </div>
    </div>
 </div>

 <div class="col-md-4">
  <div class="card">
    <img src="./Images/tulsibackround.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tulsi </h5>
      <p class="card-text"> Tulsi is used for many diseases it give 24 hours oxizen and lots of benifits.</p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="card">
    <img src="./Images/Stevia-Plant.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Stevia Plant </h5>
      <p class="card-text">Stevia Plant delicious taste, excellent flavor and attractive fragrance, it is rich in vitamins A and C..</p>
      <a href="#" class="btn btn-primary">Buy Now</a>
    </div>
  </div>
</div>

<div> 
<a href="display_all.php" class="btn-read"> Explore All Products </a>
</div>

     </div>
  </div>
  </div>
<!-- product End-->


<!-- Best features start -->
<div class = "best-features"> 
    <div class="container">
      <div class="row"> 
        <div class="col-md-12">
          <div class="section-heading"> 
            <h2> About Mission-Dhanwantri</h2>
          </div>
        </div>

        <div class="col-md-6">
          <div class="left-content"> 
            <h5> Women Empowerment Through Herbs </h5>
          </div>
          <p> Dhanvantari (Sanskrit: धन्वन्तरि), Dhanvantari, Dhanvamtari,is the physician of the devas in Hinduism. He is regarded to be an avatar of Vishnu. He is mentioned in the Puranas as the god of Ayurveda.</p>
          <p> It is a empowerment mission in Himachal to sustain the livelihood of rural women of the District by the initiative of District Administration Kangra under  <strong> Mission Dhanvantri </strong> for cultivation and value addition of herbs by SHG under NRLM. Along with other stakeholder departments, to sustainably grow herbs with traditional methods. 
          </p>
          <ul> 
            <li> The self-help groups are trained and supportedby experts from AYUSH deptt. </li>
            <li> These products are being promoted by an initiative of DRDA through APNA KANGRA  </li>
            <li>When you purchase these products, you join the mission of changing lives as 100% of the benefit goes to the SHGs. </li>
            
          </ul>
        <a href="#" class="btn-read"> Read More </a>
        </div>

        <div class="col-md-6">
          <div class="right-image">
          <img src="./Images/Shree-Dhanvantari-img.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
 </div>
 <!-- best feature end -->

 <!-- medicinal product  start-->
            <div class="medicinal-plants">
              <div class="container"> 
                <div class="row"> 
                  <div class="col-md-12">
                  <div class="section-heading">
                    <h2> Medicinal Plants</h2>
                  </div>
                  </div>
                 
                  <div class="col-md-6">
                    <div class="left-content"> 
                      <img src="./Images/medicinal plants.jpg" alt="" class="img-fluid">
                    </div>
                    </div>

                  <div class="col-md-6">
                    <div class="right-content"> 
                    <p>Medicinal Plants refers to using a plants'seeds,berries,roots, leaves, flowers for medicinal purpose. </p>
                    <ul>
                      <li>Medicinal plants are plants that have a recognized medical use.</li>
                      <li>Herbal medicine is one of the oldest forms of medical treatment in human history and could be considered one of the forerunners of the modern pharmaceuticla trade.</li>
                      </ul>
                  </div>
                </div>
                </div>
              </div>

             </div>
 <!-- medicinal plant end  -->


 <!-- call to action start -->
 <div class="call-to-action">
    <div class="container">
      <div class="section-heading"> 
        <h2> Creative and Unique Products </h2>
      </div>
      <div>
        <p>A substance or combination of substances that is intended to treat, prevent or diagnose a disease, or to restore, correct or modify physiological functions by exerting a pharmacological, immunological or metabolic action. Herbal medicinesTrusted Source are natural botanical products, derived from plants, that people may use to treat and prevent diseases.</p>
        <p>
          <strong> How to take herbal supplements?</strong>
         How a person takes herbal supplements depends on the form. They are available as tablets, capsules, teas, powders, extracts, and fresh or dried plants. </p>
       
        
      </div>
      <div>
        <a href="display_all.php" class="filled-button"> Purchage Now </a>
      </div>
    </div>
  </div>
<!-- call to action end -->

<!-- find us start -->
<div class="find-us">
    <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="section-heading">
                 <h2> Our Location on Maps </h2>
             </div>
         </div>

         <div class="col-md-6">
             <div id="map"> 
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6780.223017492833!2d76.20558183886229!3d31.821956212536193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391b3b09289b0823%3A0x50596cd5ec2fb2c7!2sPragpur%2C%20Himachal%20Pradesh%20177107!5e0!3m2!1sen!2sin!4v1691042229029!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div>

         </div>

         <div class="col-md-6">
          <div class="icon"> 
          <p><i class="bi bi-geo-alt-fill"></i> Village Chameti,Gram Panchayat Kuhna Block Pragpur HP </p> 
           <p> <i class="bi bi-telephone"></i> 8894195763</p> 
           <p> <i class="bi bi-envelope"></i> vishavpujitagramsangathan@gmail.com </p>
           </div>
         </div>
     </div>
    </div>
  </div>
<!-- find us end -->

<!-- footer start -->


  <footer>
    <?php
    include("./includes/footer.php");
    ?>
    </footer>

<!-- footer end  -->







      <!-- fetching products -->

<!-- <?php  
    // calling function
    getproducts();
    get_unique_categories();
    get_unique_brands();
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  
?> -->
<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>