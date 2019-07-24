
<?php

session_start();
if(!isset($_SESSION['mail'])){
  header('Location: formloggin.php');
  }





$donnees = [['title' => 'Mon titre', 'content' => 'mon contenu', 'img'=>'pic.jpg'],['title' => 'Mon titre2', 'content' => 'mon contenu2', 'img'=>'pic2.jpeg']]

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <title>Voyage</title>
</head>


<body>
<div class="container-fluid">

  <nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
      <a class="navbar-brand" href="#">Voyajero</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#" id="parcourir"> Parcourir <span class="sr-only">(current)</span></a>
          </li>
          <?php
          if(!isset($_SESSION['mail'])){
            ?>
          <li class="nav-item">
            <button class="btn btn-sm btn-outline-secondary bg-danger " name="deco" id="deco" type="submit"> Connexion </button>
          </li>

          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="addTravel.php" id="ajout">Ajouter Voyage </a>
          </li>
          <?php
          if(isset($_SESSION['mail'])){
            ?>
          <li class="nav-item">
            <a href="deco.php"><button class="btn btn-sm btn-outline-secondary bg-danger " name="deco" id="deco"> Deconnexion </button></a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
  
  </nav>
</div>

<?php

try{

  $go_bdd = new PDO('mysql:host=localhost;dbname=voyage;charset=utf8','root','');
}

catch (Exception $e){

  die('Erreur : '. $e->getMessage());

}

$response = $go_bdd->query('SELECT * FROM voyages');

// pour afficher les données 

while ($data = $response->fetch(PDO::FETCH_ASSOC)) {
  echo '<h2>'. $data['title'] . '</h2>' . '<br><br><br>' . '<p>' . $data['content'] . '</p>' . '<br><br><img src="' . $data['image'] . '" class="img">'; 
  
}










?>
</div>



<?php

// SELECT * FROM `voyages` WHERE 1





?>





















<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="jqueryeasy.js">
    
</body>
</html>