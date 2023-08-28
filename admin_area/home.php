<?php  
    // connect file
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>    

<?php
    if(!isset($_SESSION['admin_name'])){
        echo "<script>window.open('index.php','_self')</script>";
    }

    $admin_name=$_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        body{
            overflow-x: hidden;
        }
        .product_img{
            width: 100px;
            height:100px;
            object-fit: contain;
        }
    </style>

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome <?php echo $admin_name ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">

                <div class="p-3">
                    <a href="#"><img src="../Images/admin login.jpeg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin : <?php echo $admin_name ?></p>
                </div>

                <div class="button text-center ">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="home.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="home.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="home.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="home.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="home.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="home.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="home.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="home.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="home.php?admin_logout" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        
        <div class="container my-3">
            <?php  
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_payments'])){
                include('delete_payments.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }
            if(isset($_GET['admin_logout'])){
                include('admin_logout.php');
            }
            ?>
        </div>

        <!-- last child -->
        <div class="bg-info p-3 text-center ">
            <p> Designed by Rohit Dhillon & Pankaj Sharma</p>
        </div>
    </div>
    

<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>