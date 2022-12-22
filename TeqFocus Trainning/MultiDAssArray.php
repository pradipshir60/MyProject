<?php
   $fees=array(
       "Jayesh"=>array(
                  "php" => 10, "Java" => 20),
       "Shubham"=>array(
                  "php" => 20, "Java" => 50),
       "Pratik"=> array(
                 "php" => 25, "Java "=> 55)
   );
   foreach($fees as $keys=>$values)
   {
        foreach($values as $key=>$data)
        {
            echo $keys ." ". $key." ".$data. " \n";
        }
   }
  ?>