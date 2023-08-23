<?php
//connection String
include('./includes/connect.php');
if(isset($_POST['submit'])){
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  
  //insert Query 
  $insert_query = "insert into `contact`(name,email,subject,message) values('$fullname','$email','$subject','$message')";
  $result = mysqli_query($con,$insert_query);
          if($result){
              echo "<script> alert('Data inserted successfully')</script>";
          }else{
              die(mysqli_error($con));
          }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission Dhanwantri </title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">

<!-- icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- External stylesheet  -->
        <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <!-- header start -->
    <nav class="navbar navbar-expand-lg  fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./Images/logo.png" alt="" class="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav  ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- header end -->

      <!-- banner start -->
<div class="banner-contect"> 
    <div class="text-content"> 
        <!-- <h4> Contact Us </h4> -->
        <h3> Let's get in Touch</h3>
    </div>
</div>
<!-- banner end -->
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
           <p> <i class="bi bi-telephone"></i> 8894195763, 93187-80030, 94597-76559 </p> 
           <p> <i class="bi bi-envelope"></i> vishavpujitagramsangathan@gmail.com </p>
           </div>
         </div>
     </div>
    </div>
  </div>
<!-- find us end -->
<div class="send-message">
  <div class="container">
    <div class="row">
       <div class="col-md-12"> 
        <div class="section-heading"> 
          <h2> Send Us a Message </h2>
        </div>
       </div>

       <div class="col-md-12"> 
        <div class="contact-form"> 
          <form  method="post" onsubmit="return validateForm()" >
             <div class="col-md-12"> 
              <input type="text" id="name"  name="fullname" class="form-control" placeholder="Full Name" autocomplete="off">
             </div>

             <div class="col-md-12"> 
              <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off">
             </div>

             <div class="col-md-12"> 
              <input type="text" id="subject"  name="subject" class="form-control" placeholder="subject">
             </div>
                
             <div class="col-md-12"> 
              <textarea id="message" row="6" name="message" class="form-control" placeholder="Enter Your Message">
              </textarea>
             </div>
             <div class="col-md-12">
              <button type="submit" class="btn-send" name="submit"> Send Message </button>
             </div>
          </form>
        </div>
       </div>
    </div>
  </div>
</div>

<!-- footer start -->
<footer> 
  <?php
  include("./includes/footer.php");
  ?>
  </footer>
  <!-- footer end  -->
  
  
  </body>
  <script src="js/main.js"> </script>
  <!-- bootstrap javascript  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </script>
  </html>
  <?php

  ?>