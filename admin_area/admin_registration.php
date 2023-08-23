<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Registration page</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- <?php echo $_SESSION['username'] ?> -->
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="./images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your confirm_password" required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? 
                            <a href="index.php" class="link-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['admin_registration'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hash_password=password_hash($password,PASSWORD_DEFAULT);
        $confirm_password=$_POST['confirm_password'];
        
        $user_ip=getIPAddress();

        // select query
        $select_query="Select * from `admin_table` where admin_name='$username' or admin_email='$email'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script> alert('Admin name and Email already exist')</script>";
        }else if($password != $confirm_password){
            echo "<script> alert('Passwords do not match')</script>";
        }else{

        // insert query
        
        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ('$username','$email','$hash_password')";

        $sql_execute = mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script> alert('Data inserted successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
    }

    // selecting cart items
    // $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    // $result_cart=mysqli_query($con,$select_cart_items);
    // $rows_count_cart=mysqli_num_rows($result_cart);
    // if($rows_count_cart>0){
    //     $_SESSION['username']=$user_username;
    //     echo "<script>alert('You have items in your cart')</script>";
    //     echo "<script>window.open('checkout.php','_self')</script>";
    // }else{
    //     echo "<script>window.open('../index.php','_self')</script>";
    // }
    
    }
?>