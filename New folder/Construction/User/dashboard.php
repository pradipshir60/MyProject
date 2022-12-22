<?php
session_start();
if(isset($_SESSION['user_id']))
{
    include "header.php";
    include "../connection.php";
    
    $con = new mysqli($host, $user, $password, $dbname, $port) 
        or die('Could not connected to the database server '.mysqli_connect_error());
?>

<!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="./">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        
        <!-- Pending Requests -->
        <div class="row mb-3" style="margin: auto">
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                              $query = "SELECT COUNT(*) as total FROM orders WHERE status=0 AND user_id=".$_SESSION['user_id'];
                              $result = mysqli_query($con, $query);
                              $data=mysqli_fetch_assoc($result);
                              echo $data['total'];
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                  <div class="text-center" style="margin-top: 20px;">
                    <small>
                      <a href="applied_orders.php" class="text-muted">View</a>
                    </small>
                  </div>
                </div>
              </div>
            </div>


            <!-- OnGoing Order -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Ongoing Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                              $query = "SELECT COUNT(*) as total FROM orders WHERE status=2 AND user_id=".$_SESSION['user_id'];
                              $result = mysqli_query($con, $query);
                              $data=mysqli_fetch_assoc($result);
                              echo $data['total'];
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dolly fa-2x text-success"></i>
                    </div>
                  </div>
                  <div class="text-center" style="margin-top: 20px;">
                    <small>
                      <a href="applied_orders.php" class="text-muted">View</a>
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Completed Orders -->
            <div class="col-xl-3 col-md-6 mb-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Completed Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                              $query = "SELECT COUNT(*) as total FROM orders WHERE status=4 AND user_id=".$_SESSION['user_id'];
                              $result = mysqli_query($con, $query);
                              $data=mysqli_fetch_assoc($result);
                              echo $data['total'];
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-success"></i>
                    </div>
                  </div>
                  <div class="text-center" style="margin-top: 20px;">
                    <small>
                      <a href="completed_orders.php" class="text-muted">View</a>
                    </small>
                  </div>
                </div>
              </div>
            </div>

                    </div>
                </div>
            </div>

<?php
include "footer.html";
}

else
{
    echo "Session Timed Out!!!";
    exit();
}

?>