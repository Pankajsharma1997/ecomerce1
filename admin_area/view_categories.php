<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Sl no</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <?php
            $select_cat="Select * from `categories`";
            $result=mysqli_query($con,$select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
            
        ?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $category_title ?></td>
        <td><a href="home.php?edit_category=<?php echo $category_id ?>" class="text-light"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a href="home.php?delete_category=<?php echo $category_id ?>" class="text-light" onclick="return confirm('Are you sure you want to delete this product');"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>