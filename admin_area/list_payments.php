<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
            $get_payments="Select * from `user_payments`";
            $result=mysqli_query($con,$get_payments);
            $row_count=mysqli_num_rows($result);
            

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
    }else{
        echo "<tr>
            <th>Sl no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    ";

        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_mode=$row_data['payment_mode'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $date=$row_data['date'];
            $number++;
        ?>    
            
            <tboby class='bg-secondary text-light text-center'>
            <tr class='bg-secondary text-light text-center'>
            <td><?php echo $number ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $amount ?></td>
            <td><?php echo $payment_mode ?></td>
            <td><?php echo $date ?></td>
            
            <td><a href='home.php?delete_payments=<?php echo $order_id ?>' class='text-light' onclick="return confirm('Are you sure you want to delete this payment');"><i class='fa fa-trash'></i></a></td>
        </tr> 
        

        <?php
        }
    }
        ?>
        
        
    </tboby>
</table>