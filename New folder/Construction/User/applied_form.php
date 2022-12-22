<?php 
session_start();

if(isset($_SESSION['user_id']))
{
include "header.php";
include "../connection.php";
$con = new mysqli($host, $user, $password, $dbname, $port) 
    or die('Could not connected to the database server '.mysqli_connect_error());

$query = "SELECT * from requirement_form WHERE status<>'Completed' AND user_id=".$_SESSION['user_id'];
$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<div class="container-fluid" id="container-wrapper" style="margin-bottom: 12%">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Applied For Requirement Form</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">User Requirement Form</li>
      <li class="breadcrumb-item active" aria-current="page">Applied Form</li>
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
                <th>Form No</th>
                <th>Address</th>
                <th>Area</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php
            if (mysqli_num_rows($result)==0) 
            { 
                ?>
                <tr>
                    <td colspan="13" style="text-align: center; padding: 5%">
                        No Orders yet!!
                    </td>
                </tr>
                <?php
            }
            else
            {
            while($row=mysqli_fetch_array($result))
            {
                ?>
                <tr>
                  <td><?php echo $row['form_id']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['area']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td>
                      <?php 
                        $validate = $row['validate'];
                        $status = $row['status'];

                        if($validate == 0 && $status=='No Action')
                        {
                            ?>
                                <span class="badge badge-primary">Reuqest Not Accepted Yet</span>
                                <td><a href="cancel_form.php?form_id=<?php echo $row['form_id']; ?>" class="btn btn-danger">Cancel</a></td>
                            <?php
                        }

                        if($validate == 1 && $status=='No Action')
                        {
                            ?>
                                <span class="badge badge-warning">Form Accepted</span>
                            <?php
                        }

                        if($status == 'Accepted')
                        {
                            ?>
                                <span class="badge badge-success">Contracter Allocated</span>
                            <?php
                        }
                        ?>
                  </td>
                 
                </tr>
                <?php
                  }
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
}

else
{
  echo "Session Timed Out!!!";
  exit();
}
mysqli_close($con);

?>

