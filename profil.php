<?php

session_start();

@include 'config.php';

$utilisateur_id = (int) trim($_GET['id']);

echo $utilisateur_id;exit;

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
 }

 if(empty($utilisateur_id)){
    header('location:admin_page.php');
    exit;
 }

    $query = "SELECT * FROM user_form WHERE id = ?";
    $req = $conn->prepare($query);
    $req->execute(array($utilisateur_id));   
 
    $voir_utilisateur = $req->fetch();

    if(!isset($voir_utilisateur['id'])) {
        header('location:admin_page.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?=  $voir_utilisateur['name']; ?></title>
</head>
<body>
    <div class="logo">Bonjour, <?php echo $voir_utilisateur['user_name']; ?></div>
</body>
</html>