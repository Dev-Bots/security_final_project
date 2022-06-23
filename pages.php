<?php

include 'config.php';
// this page mainly deals with sql injection mitigation

if(isset($_POST['submit'])){

$email =$_POST['email'];
$password = $_POST['password'];



$sanitized_email=
mysqli_real_escape_string($conn,$email);
$sanitized_password=
mysqli_real_escape_string($conn,$password);

$sql= "SELECT * FROM user_form WHERE email = '". $sanitized_email ."' && password = '". $sanitized_password ."'";


$result=mysqli_query($conn,$sql) or die(mysqli_query($conn)) ;

$num=mysqli_fetch_array($result);


if($num > 0) {
    echo "Login Success";
}
else {
    echo "Wrong User id or password";
}

};
  


?>