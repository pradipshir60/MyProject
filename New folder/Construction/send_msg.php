<?php 

$name = $_POST['cont_name'];
$email = $_POST['cont_email'];
$phn = $_POST['cont_phn'];
$msg = $_POST['cont_msg'];

$to = "shashankshirode@gmail.com";
$subject = "User Query";
$txt = $msg;
$headers = "From: $email" . "\r\n Name: $name". "\r\n Phone No: $phn" . "\r\n";

mail($to, $subject, $txt, $headers);

if(mail)
{
    echo "Sent";
}
else{
    echo "ERROR";
}

?>