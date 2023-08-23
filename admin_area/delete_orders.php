<?php
    if(isset($_GET['delete_orders'])){
        $delete_id=$_GET['delete_orders'];

        $delete_query="Delete from `user_orders` where order_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo "<script>alert('Order is been Deleted successfully')</script>";
            echo "<script>window.open('home.php?list_orders','_self')</script>";
        }
    }
?>