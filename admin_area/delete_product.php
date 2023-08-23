<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
    }

    // delete query
    $delete_prooduct="Delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($con,$delete_prooduct);
    if($result_product){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('home.php','_self')</script>";
    }
?>