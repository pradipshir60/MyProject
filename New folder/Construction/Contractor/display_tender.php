<?php
$file = $_GET['file'];

header("content-disposition: attachment; filename=".urlencode($file));

$fb = fopen("../Admin/e_tender/".$file, "r");

while(!feof($fb))
{
    echo fread($fb, 8192);
    flush();
}

fclose($fb);

?>