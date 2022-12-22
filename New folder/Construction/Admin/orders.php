<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Material Orders</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Material</li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
    </div>
    
    <div class="table-responsive scrollable">
        <table class="table align-items-center table-flush" style="text-align: center">
            <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Dealer Name</th>
                    <th>Material</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            
            $query = "select orders.order_id,user.name,dealer.name,orders.material,orders.total,orders.status FROM orders,user,dealer WHERE orders.user_id=user.id AND orders.dealer_id=dealer.id";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result)==0) 
            { 
                ?>
                <tr>
                    <td colspan="13" style="text-align: center; padding: 5%">
                        No new registrations!!
                    </td>
                </tr>
                <?php
            }
            while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['material']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php 
                                $status = $row['status'];                    
                                if($status == 0)
                                {
                                    ?>
                                    <span class="badge badge-primary">No Allocation</span>
                                    </td>
                                    <td>
                                        <a href="delete_order.php" class="btn btn-block btn-danger">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                    <?php
                                }
                                else if($status == 1)
                                {
                                    ?>
                                    <span class="badge badge-warning">Pending</span>
                                    </td>
                                    <td>
                                        <a href="delete_order.php" class="btn btn-block btn-danger">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                    <?php
                                }
                                else if($status == 2)
                                {
                                    ?>
                                    <span class="badge badge-success">Placed</span>
                                    </td>
                                    <td>
                                        <a href="delete_order.php" class="btn btn-block btn-danger">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                    <?php
                                }
                                else if($status == 3)
                                {
                                    ?>
                                    <span class="badge badge-danger">Rejected</span>
                                    </td>
                                    <td colspan="2">
                                        <a href="edit_order.php?order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary">
                                            <span class="fas fa-edit"></span>
                                        </a>
                                        <a href="delete_order.php" class="btn btn-danger">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                    </td>
                                    <?php
                                }
                                else if($status == 4)
                                {
                                    ?>
                                    <span class="badge badge-info">Completed</span>
                                    </td>
                                    <?php
                                }
                        ?></td>
                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        


<?php
include "footer.html";
?>