<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'Email ou mot de passe incorrect !';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Connectez-vous</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/form.css">

</head>
<body style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(img/bg.jpg);">
   
<div class="container">

   <form action="" method="post" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="input-group">
         <input type="email" name="email" required placeholder="Email">
      </div>
      <div class="input-group">
         <input type="password" name="password" required placeholder="Mot de passe">
      </div>
      <div class="input-group">
         <button type="submit" name="submit" class="btn">Connection</button>
      </div>
      
      
      <p class="login-register-text">Vous n'avez pas de compte ?<a href="register_form.php"> Inscrivez-vous !</a></p>
   </form>

</div>

</body>
</html>