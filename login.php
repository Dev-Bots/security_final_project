<?php

@include 'config.php';
require 'pages.php';

session_start();

if(isset($_POST['submit'])){

// the test_input function will check for the validity of the data of the form
function test_input($data){

   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;




}

   $name = test_input(mysqli_real_escape_string($conn, $_POST['name']));
   $email =test_input(mysqli_real_escape_string($conn, $_POST['email']));
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
   $pass =test_input( md5($_POST['password']));
   $cpass = test_input( md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   if(!empty ($email)&& !empty($pass)){

   



   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user' AND $row['status']=='0'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['id'];
         header('location:user_page.php');

      }
      elseif($row['user_type'] == 'user' AND $row['status']=='1'){

         $error[] = 'account temporarily disabled';
         header("location: login.php");
         

   }
  
     
   }else{
      $error[] = 'incorrect email or password!';
      header("location: login.php");
      
   }
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- tailwind css -->
   <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>


   
<div class="form-container">

   <form action="" method="post" action="<?php echo htmlspecialchars($_SERVER[PHP_SELF]);?>">
      <h1 >ADDIS ABABA CITY ROAD AUTHORITY</h1><br><br>
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>