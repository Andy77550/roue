<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = $_POST['phone'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = "user";

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Compte déjà existant!';

   }else{

      if($pass != $cpass){
         $error[] = 'Le mot de passe ne correspond pas !';
      }else{
         $insert = "INSERT INTO user_form(name, email, phone, password, user_type) VALUES('$name','$email','$phone','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
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
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/form.css">

</head>
<body style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(img/bg.jpg);">
   
<div class="container">

   <form action="" method="post" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
      <div class="input-group">
         <input type="text" name="name" required placeholder="Nom/Prénom">
      </div>
      
      <div class="input-group">
         <input type="email" name="email" required placeholder="Email">
      </div>

      <div class="input-group">
         <input type="tel" name="phone" required placeholder="Téléphone">
      </div>

      <div class="input-group">
         <input type="password" name="password" required placeholder="Mot de passe">

      </div>
      
      <div class="input-group">
         <input type="password" name="cpassword" required placeholder="Confirme ton mot de passe">
      </div>
      
      <!-- <select name="user_type">
         <option value="user">apprenant</option>
         <option value="admin">administrateur</option>
      </select> -->



      <div class="input-group">
         <button type="submit" class="btn" name="submit">Valider</button>
         
      </div>
      

      

      

      
    

      
      

      <p class="login-register-text">Vous avez déjà un compte? <a href="login_form.php">Connecte-toi maintenant</a></p>
   </form>

</div>

</body>
</html>