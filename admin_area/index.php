<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
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
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="./images/admin_login.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>

                    

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>

            

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? 
                            <a href="admin_registration.php" class="link-danger">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $select_query="Select * from `admin_table` where admin_name='$username'";
    $result=mysqli_query($con,$select_query);
    $row_data=mysqli_fetch_assoc($result);
    $row_count=mysqli_num_rows($result);
    $user_ip=getIPAddress();

        $_SESSION['admin_name']=$username;
        if(password_verify($password,$row_data['admin_password'])){
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('home.php','_self')</script>";
            }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    
}
?>