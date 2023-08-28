<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
            $get_payments="Select * from `user_table`";
            $result=mysqli_query($con,$get_payments);
            $row_count=mysqli_num_rows($result);
            

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
    }else{
        echo "<tr>
            <th>Sl no</th>
            <th>username</th>
            <th>user_email</th>
            <th>user_image</th>
            <th>user_address</th>
            <th>user_mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    ";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $user_image=$row_data['user_image'];
            $number++;
            ?>
            
            <tboby class='bg-secondary text-light text-center'>
            <tr class='bg-secondary text-light text-center'>
            <td><?php echo $number ?></td>
            <td><?php echo $username ?></td>
            <td><?php echo $user_email ?></td>
            <td><img src='../users_area/user_images/<?php echo $user_image ?>' alt='$username' class='product_img'</td>
            <td><?php echo $user_address ?></td>
            <td><?php echo $user_mobile ?></td>

            
            <td><a href='home.php?delete_users=<?php echo $user_id ?>' class='text-light' onclick="return confirm('Are you sure you want to delete this user');"><i class='fa fa-trash'></i></a></td>
        </tr> 
        

        <?php
        }
    }
        ?>
        
        
    </tboby>
</table>