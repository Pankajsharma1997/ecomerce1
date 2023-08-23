<?php
    if(isset($_GET['delete_payments'])){
        $delete_id=$_GET['delete_payments'];

        $delete_query="Delete from `user_payments` where order_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo "<script>alert('Payment is been Deleted successfully')</script>";
            echo "<script>window.open('home.php?list_payments','_self')</script>";
        }
    }
?>