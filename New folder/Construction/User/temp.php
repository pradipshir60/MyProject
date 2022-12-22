<?php


$name = array();
$rate = array();

$query = "SELECT * FROM material";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
    array_push($name, $row['name']);
    array_push($rate, $row['price']);
    
}
    
    session_start();
if($_SESSION['user_id'])
{

$qnt_concrete = $_GET['concrete'];
$qnt_cement = $_GET['cement'];
$qnt_river_sand = $_GET['river_sand'];
$qnt_aggregates = $_GET['aggregates'];
$qnt_bricks = $_GET['bricks'];
$qnt_steel = $_GET['steel'];
$qnt_wood = $_GET['wood'];
$qnt_glass = $_GET['glass'];
$qnt_ceramics = $_GET['ceramics'];
$qnt_plastics = $_GET['plastics'];

$rate_concrete = 3000;
$rate_cement = 350;
$rate_river_sand = 9000;
$rate_aggregates = 900;
$rate_bricks = 12;
$rate_steel = 38000;
$rate_wood = 1000;
$rate_glass = 150;
$rate_ceramics = 500;
$rate_plastics = 85;

$cnt=1;
$total = 0;
$material = array();
$quantity = array();

?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>


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
        //For Concrete
        if($qnt_concrete > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Concrete"); array_push($quantity, $qnt_concrete); ?></th>
        <td>Concrete</td>
        <td><?php echo $rate_concrete ?></td>
        <td><?php echo $qnt_concrete ?></td>
        <td><?php echo $concrete = $rate_concrete*$qnt_concrete; $total = $total+$concrete; ?></td>
    </tr>
    <?php
        }
    ?>

    
    <?php
        //For Cement
        if($qnt_cement > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++;  array_push($material, "Cement"); array_push($quantity, $qnt_cement); ?></th>
        <td>Cement</td>
        <td><?php echo $rate_cement ?></td>
        <td><?php echo $qnt_cement ?></td>
        <td><?php echo $cement = $rate_cement*$qnt_cement; $total = $total+$cement ?></td>
    </tr>
    <?php
        }
    ?>


    <?php
        //For River Sand
        if($qnt_river_sand > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "River Sand"); array_push($quantity, $qnt_river_sand);?></th>
        <td>River Sand</td>
        <td><?php echo $rate_river_sand ?></td>
        <td><?php echo $qnt_river_sand ?></td>
        <td><?php echo $river_sand = $rate_river_sand*$qnt_river_sand; $total = $total+$river_sand ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Aggregates
        if($qnt_aggregates > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Aggregates"); array_push($quantity, $qnt_aggregates); ?></th>
        <td>Aggregates</td>
        <td><?php echo $rate_aggregates ?></td>
        <td><?php echo $qnt_aggregates ?></td>
        <td><?php echo $aggregates = $rate_aggregates*$qnt_aggregates; $total = $total+$aggregates ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Bricks
        if($qnt_bricks > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Bricks"); array_push($quantity, $qnt_bricks); ?></th>
        <td>Bricks</td>
        <td><?php echo $rate_bricks ?></td>
        <td><?php echo $qnt_bricks ?></td>
        <td><?php echo $bricks = $rate_bricks*$qnt_bricks; $total = $total+$bricks ?></td>
    </tr>
    <?php
        }
    ?>
    

    
    <?php
        //For Steel
        if($qnt_steel > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Steel"); array_push($quantity, $qnt_steel); ?></th>
        <td>Steel</td>
        <td><?php echo $rate_steel ?></td>
        <td><?php echo $qnt_steel ?></td>
        <td><?php echo $steel = $rate_steel*$qnt_steel; $total = $total+$steel ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Wood
        if($qnt_wood > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Wood"); array_push($quantity, $qnt_wood); ?></th>
        <td>Wood</td>
        <td><?php echo $rate_wood ?></td>
        <td><?php echo $qnt_wood ?></td>
        <td><?php echo $wood = $rate_wood*$qnt_wood; $total = $total+$wood ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Glass
        if($qnt_glass > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Glass"); array_push($quantity, $qnt_glass); ?></th>
        <td>Glass</td>
        <td><?php echo $rate_glass ?></td>
        <td><?php echo $qnt_glass ?></td>
        <td><?php echo $glass = $rate_glass*$qnt_glass; $total = $total+$glass ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Ceramics
        if($qnt_ceramics > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Ceramics"); array_push($quantity, $qnt_ceramics); ?></th>
        <td>Ceramics</td>
        <td><?php echo $rate_ceramics ?></td>
        <td><?php echo $qnt_ceramics ?></td>
        <td><?php echo $ceramics = $rate_ceramics*$qnt_ceramics; $total = $total+$ceramics ?></td>
    </tr>
    <?php
        }
    ?>
    

    <?php
        //For Plastics
        if($qnt_plastics > 0)
        {
    ?>
    <tr>
        <th scope="row"><?php echo $cnt++; array_push($material, "Plastics"); array_push($quantity, $qnt_plastics); ?></th>
        <td>Plastics</td>
        <td><?php echo $rate_plastics ?></td>
        <td><?php echo $qnt_plastics ?></td>
        <td><?php echo $plastics = $rate_plastics*$qnt_plastics; $total = $total+$plastics ?></td>
    </tr>
    <?php
        }
    ?>

  </tbody>
</table>

<table class="table table-hover" style="width: 80%; margin: auto; margin-top: 0px; margin-bottom: 20%">
<?php
if($total == 0)
{
    ?>
    <script>
        alert("Please add items to proceed!");
        window.location.href="../index.php";
    </script>
    <?php
}

else if($total>0)
{
?>
    <tr> 
        <td colspan="6" style="text-align: right; padding-right: 205px"><b>Total Amount:    <?php echo $total ?> <b></td>
    </tr>

<?php
}

else
{
    ?>  
    <tr>
        <td colspan="6" style="padding: 5%; text-align: center">No items added</td>
    </tr>
    <?php
}

?>

</table>

<a href="checkout.php?material=<?php echo implode(", ",$material) ?>&quantity=<?php echo implode(", ",$quantity) ?>&total=<?php echo $total; ?>" 
class="btn btn-sm btn-primary" style="width: 40%; height: 35px; margin-left: 30%; margin-bottom: 5%; margin-right: 30%">Send Quotation</a>
</form>

<?php
}
else
{
    ?>
    <script>
        alert("Please Login first!");
        window.location.href="login.html";
    </script>
    <?php
}
?>