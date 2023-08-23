<?php
    if(isset($_GET['delete_brands'])){
        $delete_category=$_GET['delete_brands'];

        $delete_query="Delete from `brands` where brand_id=$delete_category";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo "<script>alert('Brand is been Deleted successfully')</script>";
            echo "<script>window.open('home.php?view_brands','_self')</script>";
        }
    }
?>