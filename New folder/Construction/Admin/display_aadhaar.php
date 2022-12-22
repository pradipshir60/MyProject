<?php
$file = $_GET['file'];

header("content-disposition: attachment; filename=".urlencode($file));

$fb = fopen("../Dealer/uploads/".$file, "r");

while(!feof($fb))
{
    echo fread($fb, 8192);
    flush();
}

fclose($fb);

?>