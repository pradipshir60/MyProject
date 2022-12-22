<?php 
session_start();

if(isset($_SESSION['dealer_id']))
{

include "header.php";
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "select orders.order_id,user.name,user.email,user.address,orders.material,orders.quantity from user,orders,dealer WHERE orders.user_id=user.id AND orders.dealer_id=dealer.id AND dealer.id=".$_SESSION['dealer_id']." AND orders.status=1";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Requirement Details</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Material Request</li>
    </ol> 
  </div>

  <div class="row" style="margin: auto">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Material Required</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $query1 = "SELECT * from orders WHERE status=1 AND dealer_id=".$_SESSION['dealer_id'];
            $result1 = mysqli_query($con, $query1);
            if (mysqli_num_rows($result1)==0) 
            { 
                ?>
                <tr>
                    <td colspan="13" style="text-align: center; padding: 5%">
                        No new requests!!
                    </td>
                </tr>
                <?php
            }
                  while($row=mysqli_fetch_array($result))
                  {
                ?>
                <tr>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['material']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td colspan="2">
                    <a class="btn btn-success" href="accept_request.php?order_id=<?php echo $row['order_id'] ?>" data-toggle="tooltip" data-placement="top" title="Accept Order"><span class="fas fa-check"></span></a>
                    <a class="btn btn-danger" href="reject_request.php?order_id=<?php echo $row['order_id'] ?>" data-toggle="tooltip" data-placement="top" title="Reject Order"><span class="fas fa-trash"></span></a>
                  </td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
</div>
<?php 
include "footer.html"; 
mysqli_close($con);

}
else
{
  echo "Session Timed Out!!!";
  exit();
}

?>

