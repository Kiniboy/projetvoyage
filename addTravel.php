<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" class="animate.css">
    <title>AddTravel</title>
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
          <li class="nav-item">
            <button class="btn btn-sm btn-outline-secondary bg-danger " name="deco" id="deco" type="submit"> Connexion </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="ajout">Ajouter Voyage </a>
          </li>
          <li class="nav-item">
            <a href="deco.php"><button class="btn btn-sm btn-outline-secondary bg-danger " name="deco" id="deco"> Deconnexion </button></a>
          </li>
        </ul>
      </div>
  
  </nav>
</div>  
    <form method="post" enctype="multipart/form-data" id="formAddTravel" action="travelAdded.php">
        <label for="title"> Titre</label>
        <input type="text" name="title" id="title" >
        <label for="title"> Contenu </label>
        <input type="text" name="content" id="content">
        <input type="file" name="image" id="picvoyage">
        <input type="submit" value="Créer voyage" id="createTravel">
    </form>
    
<?php



?>
 
</body>
</html>