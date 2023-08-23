<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    .payment_img{
        width: 60%;
        margin: auto;
        display: block;
    }
    .shipping-form  h2{
        text-align: center;
        color:green;
        margin:23px;
    }
     .left-content {
        margin:30px;
        border:2px solid brown;
    }
    /* shipping form */
   .left-content .contact-form input,textarea{
 margin-left: 30px;
 margin-bottom: 10px;
 padding:10px

}
.btn-send{
    border:none;
    padding:10px 20px;
    background-color: #72cc50;
    color:#fff;
    margin-left:500px;
}
.btn-send:hover{
    background-color: #17850d;
}

</style>
<body>
    <!-- php code to access user id  -->
    <?php
      $username=$_SESSION['username'];
        $user_ip=getIPAddress();
        $get_user="Select * from `user_table` where user_ip='$user_ip' and username='$username'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];

    ?>
    <div class="shipping-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> Payment Options</h2>
                </div>
                
                <div class="col-md-6">
                <div class="left-content">
                    <!-- Section Heading  start -->
                    <div class="section-heading">
                         <h2> Shipping Address</h2>
                    </div>
                   <!-- Section Heading End -->

                   <!-- Shipping address form Start -->
                   <div class="contact-form">
                        <form  method="post" onsubmit="return validateForm()" >
                     
             <div class="col-md-10"> 
              <input type="text" id="name"  name="fullname" class="form-control" placeholder="Full Name" autocomplete="off">
             </div>

             <div class="col-md-10"> 
              <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off">
             </div>

             <div class="col-md-10"> 
              <input type="text" id="subject"  name="subject" class="form-control" placeholder="subject">
             </div>
                
             <div class="col-md-10"> 
              <textarea id="message" row="6" name="message" class="form-control" placeholder="Enter Your Message">
              </textarea>
             </div>
             <div class="col-md-10">
              <button type="submit" class="btn-send" name="submit"> Send Message </button>
             </div>
              </div>

          </form>


                  
                   <!-- Shipping address form Start -->

                </div>
                </div>

                <div class="right-content">
                <div class="col-md-6">

                </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../Images/payment.jpg" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Online</h2></a>
            </div>
        </div>
    </div>
</body>
</html>