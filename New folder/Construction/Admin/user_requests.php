<?php
include "index.html";
include "../connection.php";

//Database Connection
$con = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connected to the database server ' . mysqli_connect_error());

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10%">Allocate Dealer</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Material</li>
        <li class="breadcrumb-item active">User Requirements</li>
    </ol>
</div>

<div class="card" style="margin-bottom: 10%; margin-left: 5%; margin-right: 5%">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
    </div>

    <div class="table-responsive scrollable">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Allocate Dealer</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $query = "SELECT * from orders WHERE status=0";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <tr>
                        <td colspan="13" style="text-align: center; padding: 5%">
                            No new requests!!!
                        </td>
                    </tr>
                    <?php
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["order_id"] ?></td>
                            <td><?php $user_id = $row["user_id"];

                                $query1 = "select * from user,orders WHERE orders.user_id=user.id and user.id=" . $user_id;
                                $result1 = mysqli_query($con, $query1);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo $row1["name"];
                                ?>
                            </td>
                            <td>
                            <?php
                                    echo $row1["address"];
                                    break;
                                }
                            ?>
                            </td>

                            <td style="width: 300px"><?php echo $row["material"] ?></td>
                            <td style="width: 200px"><?php echo $row["quantity"] ?></td>

                            <td style="width: 200px">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <select class="custom-select mr-sm-2 dealer" id="dealer_selection" name="dealer_selection" id="inlineFormCustomSelect">
                                            <option selected value=0>Choose...</option>

                                            <?php
                                            $sql_query = "SELECT * FROM dealer WHERE status=0";
                                            $res = mysqli_query($con, $sql_query);
                                            while ($rows = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value=<?php echo $rows['id']; ?>>
                                                    <?php echo $rows['name']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <button class="sendButton btn btn-block btn-primary" name="sendButton" id="sendButton" value="<?php echo $row['order_id'] ?>">Send</button>
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


<script>
    $(document).ready(function() {
        $("select.dealer").change(function() {
            var x = $(this).children("option:selected").val();
            $(".sendButton").on("click", function() {
                var id = $(this).val();
                window.location.href = "dealer_selection.php?dealer_id=" + x + "&&order_id=" + id;
            });
        });
    });
</script>

<?php
include "footer.html";
?>

</body>