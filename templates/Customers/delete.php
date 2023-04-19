<?php

include "app_local.php";

$id = $_GET['id'];

$del= mysqli_query($db,"delete from customers where id = '$id'");
?>
