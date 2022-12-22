<?php
include "index.html";
include "../connection.php";


$con = new mysqli($host, $user, $password, $dbname, $port)
  or die('Could not connected to the database server ' . mysqli_connect_error());
?>

<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Registered Users</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active" aria-current="page">Registered Users</li>
    </ol>
  </div>

  <div class="row" style="margin-bottom: 10%">
    <div class="col-lg-12 mb-4">
      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Adress</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4">
                  <a href="#" data-toggle="modal" data-target="#add_user">+ Add User</a>

                  <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label for="firstName">Enter First Name</label>
                                  <input type="text" name="firstName" id="firstName" class="form-control" style="text-transform: capitalize" placeholder="Enter First Name" pattern="[a-zA-Z]+" title="Name should be Alphabets only" required>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label for="lastName">Enter Last Name</label>
                                  <input type="text" name="lastName" id="lastName" class="form-control" style="text-transform: capitalize" placeholder="Enter Last Name" pattern="[a-zA-Z]+" title="Name should be Alphabets only" required>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" name="address" id="address" class="form-control" style="text-transform: capitalize" placeholder="Enter Address" required>
                            </div>

                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" title="Enter correct email id" required>
                            </div>

                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" autocomplete="off" class="form-control" placeholder="Enter Password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})" title="Atleast One Symbol, One Capital Letter, One Small Letter, One Digit is required" required>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="buttonClick">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>

              <?php
              $query = "SELECT * FROM user";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
              ?>
                <tr>
                  <td colspan="13" style="text-align: center; padding: 5%">
                    No Registered Users!!
                  </td>
                </tr>
              <?php
              }

              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td>
                    <a href="update_user.php?user_id=<?php echo $row['id']; ?>" class="btn btn-warning"><span><i class="fas fa-edit"></i></span></a>
                    <a href="delete_user.php?user_id=<?php echo $row['id']; ?>" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></a>
                  </td>
                </tr>
              <?php
              }
              ?>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    function capitalize_Words(str) {
      return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      });
    }

    $('#buttonClick').click(function() {
      var fName = $("#firstName").val();
      firstName = capitalize_Words(fName);
      var lName = $("#lastName").val();
      lastName = capitalize_Words(lName);
      var name = firstName + ' ' + lastName;
      var address = $("#address").val();
      var email = $("#email").val();
      var password = $("#password").val();

      window.location.href = "add_user.php?name=" + name + "&&address=" + address + "&&email=" + email + "&&password=" + password;
    });
  });
</script>

<?php
include "footer.html";
mysqli_close($con);
?>