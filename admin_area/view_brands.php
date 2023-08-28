<h3 class="text-center text-success">All Self Help Group </h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Sl no</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
            $select_cat="Select * from `brands`";
            $result=mysqli_query($con,$select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
            
        ?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $brand_title ?></td>
        <td><a href="home.php?edit_brands=<?php echo $brand_id ?>" class="text-light"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a href="home.php?delete_brands=<?php echo $brand_id ?>" class="text-light" onclick="return confirm('Are you sure you want to delete this Self Help Group');"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>