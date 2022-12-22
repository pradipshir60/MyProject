<?php 
session_start();

if(isset($_SESSION['user_id']))
{
include "header.php";
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "SELECT * from orders WHERE status=4 AND user_id=".$_SESSION['user_id'];
$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<div class="container-fluid" id="container-wrapper" style="margin-bottom: 14%">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Completed Orders</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Completed Orders</li>
    </ol> 
  </div>

  <div class="row" style="margin: auto">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
        </div>
        <div class="table-responsive scrollable">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Order ID</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Dealer</th>
                <th>Dealer Contact</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $query1 = "SELECT * from orders WHERE status=4 AND user_id=".$_SESSION['user_id'];
            $result1 = mysqli_query($con, $query1);
            if (mysqli_num_rows($result1)==0) 
            { 
                ?>
                <tr>
                    <td colspan="13" style="text-align: center; padding: 5%">
                        No Orders yet!!
                    </td>
                </tr>
                <?php
            }
                  while($row=mysqli_fetch_array($result))
                  {
                ?>
                <tr>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php echo $row['material']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['total']; ?></td>
                  <?php
                    $query1 = "SELECT * FROM dealer,orders WHERE orders.dealer_id=dealer.id AND dealer.id=".$row['dealer_id'];
                    $result1 = mysqli_query($con, $query1);
                    while($rows = mysqli_fetch_array($result1))
                    {
                        ?>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['phn_no']; ?></td>
                        <?php                        
                        break;                    
                    }
                  ?>
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

