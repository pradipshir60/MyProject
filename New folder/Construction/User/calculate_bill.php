<?php
session_start();
if ($_SESSION['user_id']) {
    include "../connection.php";

    //Database Connection
    $con = new mysqli($host, $user, $password, $dbname, $port)
        or die('Could not connected to the database server ' . mysqli_connect_error());

    $cnt = 0;
    $count = 0;
    $name = array();
    $rate = array();
    $qnt = array();
    $total = 0;
    $mod_name = array();
    $mod_rate = array();
    $mod_qnt = array();

    $query = "SELECT * FROM material";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        array_push($name, $row['name']);
        array_push($rate, $row['price']);
        array_push($qnt, $_GET[preg_replace('/\s/', '', $row['name'])]);
        $count++;
    }

    for ($i = 0; $i < $count; $i++) {
        $total = $total + ($rate[$i] * $qnt[$i]);
    }

?>


    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>

    <div class="container-fluid" style="margin-bottom: 100px">
        <table class="table table-hover" style="width: 80%; margin: auto; margin-top: 3%">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Item</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < $count; $i++) {
                    if ($qnt[$i] == 0) {
                    } else {
                ?>
                        <tr>
                            <td><?php $cnt++;
                                echo $cnt; ?></td>
                            <td><?php echo $name[$i];
                                array_push($mod_name, $name[$i]); ?></td>
                            <td><?php echo $rate[$i];
                                array_push($mod_rate, $rate[$i]); ?></td>
                            <td><?php echo $qnt[$i];
                                array_push($mod_qnt, $qnt[$i]); ?></td>
                            <td><?php echo $rate[$i] * $qnt[$i] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>

                <tr>
                    <td colspan="6" style="text-align: right; padding-right: 205px"><b>Total Amount: <?php echo $total; ?> <b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="checkout.php?material=<?php echo implode(", ", $mod_name) ?>&quantity=<?php echo implode(", ", $mod_qnt) ?>&total=<?php echo $total; ?>" class="btn btn-sm btn-primary" style="width: 40%; height: 35px; margin-left: 30%; margin-bottom: 5%; margin-right: 30%">Send Quotation</a>

    </form>

<?php
} else {
?>
    <script>
        alert("Please Login First!!");
        window.location.href = "login.html";
    </script>
<?php
}

mysqli_close($con);
?>