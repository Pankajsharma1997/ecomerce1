<?php
    if(isset($_GET['delete_users'])){
        $delete_id=$_GET['delete_users'];

        $delete_query="Delete from `user_table` where user_id=$delete_id";
        $result=mysqli_query($con,$delete_query);
        if($result){
            echo "<script>alert('User is been Deleted successfully')</script>";
            echo "<script>window.open('home.php?list_users','_self')</script>";
        }
    }
?>