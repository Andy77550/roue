<?php

session_start();

@include 'config.php';

if(isset($_SESSION['id'])){
   $query = "SELECT * FROM user_form WHERE id = id";
   $req = $conn->prepare($query);
   $req->execute(array($_SESSION['id']));
}else{
   $query = "SELECT * FROM user_form ";
   $req = $conn->prepare($query);
   $req->execute();   
}

$resultSet = $req->get_result();
$data = $resultSet->fetch_all(MYSQLI_ASSOC);

$valueA = $_SESSION['apprentissage'];
$valueCompIntra = $_SESSION['competenceIntra'];
$valueR = $_SESSION['reflexion'];
$valueC = $_SESSION['communication'];
$valueCompInter = $_SESSION['competenceInter'];
$valueL = $_SESSION['leadership'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./css/roues.css">
   <title>Roue des compétences</title>
</head>
<body>
   <p><?php 
      foreach($data as $as){ 
         if($as['user_type'] == 'user'){
            echo $as['id']; 
         }
      }
      ?></p>
   <p>Bonjour, <?php echo $_SESSION['user_name']; ?></p>
   

   <section>
         <div class="card-container">
            <div class="chart-container">
               <h2>Roue des compétences</h2>
               <br>
               <canvas id="barCanvas" aria-label="chart" role="img" ></canvas>
            </div>
         </div>
         <p id="apprentissage" style="display: none"><?php echo $valueA; ?></p>
         <p id="intrapersonnelles" style="display: none"><?php echo $valueCompIntra; ?></p>
         <p id="reflexion" style="display: none"><?php echo $valueR; ?></p>
         <p id="communication" style="display: none"><?php echo $valueC; ?></p>
         <p id="interpersonnelles" style="display: none"><?php echo $valueCompInter; ?></p>
         <p id="leadership" style="display: none"><?php echo $valueL; ?></p>
   </section>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script src="js/don.js"></script>
</body>
</html>