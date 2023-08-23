<?php  
    // connect file
    include('./includes/connect.php');
    include('./functions/common_function.php');
    session_start();
?>

<?php
                    $get_ip_add=getIPAddress(); 
                    if(isset($_POST['update_product_quantity'])){
                        $update_value=$_POST['update_quantity'];
                        $update_id=$_POST['update_quantity_id'];
                        $update_cart="update `cart_details` set quantity=$update_value where product_id=$update_id";
                        $result_products_quantity=mysqli_query($con,$update_cart);
                        if($result_products_quantity){
                          header('location:cart.php');
                        }
                        // echo "Updated Successfully";
                        // $total_price = $total_price * $quantities;
                    }

      if(isset($_GET['remove'])){
        $remove_id=$_GET['remove'];
        mysqli_query($con,"Delete from `cart_details` where product_id=$remove_id");
        header('location:cart.php');
      }

      if(isset($_GET['delete_all'])){
        mysqli_query($con,"Delete from `cart_details` ");
        header('location:cart.php');
      }
                    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website - Cart details.</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
            
        }
    </style>
</head>
<body>
    <!--  navbar  -->
    
    <div class="conainer-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./image/product.webp" alt="" class="logo">
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
        
      </ul>
      
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

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!-- fourth child -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
              <!-- php code to dispay dynamic data -->
              <?php
              
  $get_ip_add=getIPAddress(); 
  $total_price=0;
  $cart_query="Select * from `cart_details`";
  $result=mysqli_query($con,$cart_query);
  $grand_total=0;
  $result_count=mysqli_num_rows($result);
  if($result_count>0){
      echo "<thead>
                <tr>
                    <th>Sl no</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

            $num=0;
  while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $product_quantity=$row['quantity'];
      $select_products="Select * from `products` where product_id=$product_id";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
          
          $product_price=array($row_product_price['product_price']);
          $product_id=$row_product_price['product_id'];
          $price_table=$row_product_price['product_price'];
          $product_title=$row_product_price['product_title'];
          $product_image1=$row_product_price['product_image1'];
          $product_values=array_sum($product_price);
          $total_price += $product_values;
          $num++;
  ?>

                <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>



                    <td>$<?php echo $price_table; ?>/-</td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" value="<?php echo $product_id ?>" name="update_quantity_id" id="">
                      <div class="quantity_box">
                      <input type="number" min="1" value="<?php echo $product_quantity ?>" name="update_quantity" id="" class="form-input w-50">
                      <input type="submit" value="Update Cart" name="update_product_quantity" id="" class="bg-info px-3 py-2 border-0 mx-3">
                      </div>
                      </form>
                    </td>
                    <td>$<?php echo $subtotal=number_format($price_table * $product_quantity)  ?></td>
                    <td>
                        <a href="cart.php?remove=<?php echo $product_id ?>" onclick="return confirm('Are you sure you want to delete this item')">
                        <i class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
  <?php
        $grand_total = $grand_total + ($price_table * $product_quantity);
      }
    }
  }else{
      echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
  }
  ?>              
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
            <?php
                $get_ip_add=getIPAddress(); 
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                    echo "<h4 class='px-3'>Grand Total: $<strong class='text-info'> $grand_total/-</strong></h4>
                    <input type='submit' value='Continue Shopping' name='continue_shopping' id='' class='bg-info px-3 py-2 border-0 mx-3'>
                    <button class='bg-secondary px-3 py-2 border-0 '><a href='users_area/checkout.php' class='text-light text-decoration-none'>Checkout</button>
                    <a href='cart.php?delete_all' class='delete_all_btn bg-danger text-light p-2 text-decoration-none mx-3' onclick='return confirm('Are you sure you want to delete this item')'>
                        <i class='fa fa-trash text-danger text-light p-2'></i>Delete all
            </a>";
                }
                else{
                    echo "<input type='submit' value='Continue Shopping' name='continue_shopping' id='' class='bg-info px-3 py-2 border-0 mx-3'>";
                }

                if(isset($_POST['continue_shopping'])){
                    echo "<script> window.open('index.php','_self')</script>";
                }
            ?>
            
            

        </div>
        
    </div>
</div>
  </form>

<!-- last child -->
    <div class="bg-info p-3 text-center">
        <p>All rights reserved @- Designed by Khanam-2022</p>
    </div>
    </div>


<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>