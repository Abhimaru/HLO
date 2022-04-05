<?php

$db=mysqli_connect("localhost","root","","health");
$errors = array();
if($db)
{
    #echo "connection sucessful";
}
else
{
    echo "connection failed";
}
?>
