<?php

session_start();

@include 'config.php';


if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}


if(isset($_SESSION['id'])){
   $query = "SELECT * FROM user_form WHERE id <> ? AND user_type = user";
   $req = $conn->prepare($query);
   $req->execute(array($_SESSION['id']));
}else{
   $query = "SELECT * FROM user_form ";
   $req = $conn->prepare($query);
   $req->execute();   
}

$resultSet = $req->get_result();
$data = $resultSet->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page d'administration</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/admin.css">

</head>
<body>
   
   <nav>
      <div class="logo">Bonjour, <?php echo $_SESSION['admin_name'] ?></div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="#">Accueil</a></li>
        <li><a href="#">Tableau</a></li>
        <li><a href="logout.php">Déconexion</a></li>
      </ul>
    </nav>

   <br><br><br><br>
   <section>
   <br><br><br><br>
      <h2> Liste des utilisateurs</h2>
      <br>
      <div class="tab-container">
      
         <br>

         <table>
            <thead>

               <tr>
                  <th>Utilisateurs</th>
                  <th>Profil</th>
               </tr>

            </thead>
            <tbody>

               <?php
                  
               foreach($data as $rm){
                  
               ?>

                  <tr>
                     <td>
                        <?php 
                           if($rm['user_type'] = 'user'){
                              echo '<p class="status status-intrapersonnelles">'. $rm['name'] .'</p>';
                              echo '<td><a href="profil.php?id='. $rm['id'] .'" class="btn-admin">Voir les softs-skills</a></td>';
                           }
                        ?>                  
                              
                     </td>
                  </tr>

               <?php
                  
               }
                  
               ?> 

            </tbody>
         </table>
      </div>
   </section>
</body>
</html>