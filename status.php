<?php

include 'config.php';

$id=$_GET['id'];
$status=$_GET['status'];

$query="UPDATE user_form SET status=$status where id=$id";


mysqli_query($conn,$query);
header("Location:admin_page.php");

?>