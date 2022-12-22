<?php
include "partial/dbconnect.php";
include "partial/processHeader.php";

  $sql="SELECT `name`, `email`, `Password`, `mobile`, `address` FROM `studentdetails`LIMIT 10 ";
  $result=mysqli_query($conn,$sql);
 echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
               </tr>
                
        </thead>
         
        <tbody>';
        while($row=mysqli_fetch_assoc($result)){
echo      '<tr>
                <th scope="row">'.$row['name'].'</th>
                <td>'.$row['email'].'</td>
                <td>'.$row['mobile'].'</td>
                <td>'.$row['address'].'</td>
            </tr>';}
        echo '</tbody>
    </table>';
echo '<h5>click <a href="/user/new/index.php"> here </a>  to Register Again</h5>';
session_destroy();
?>