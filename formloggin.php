<?php
session_start();

//echo password_hash("kangourou", PASSWORD_DEFAULT);

// inserer verification si déja connecté 

if(isset($_SESSION['mail'])){
    header('Location: index.php');
}


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
    <title>Loggin</title>
</head>


<body>


<?php

// on déclare les variables des posts

if(isset($_POST['mail']) && isset($_POST['pwd']) ){

    $mail= $_POST['mail'];
    $pwd= $_POST['pwd'];


    // on déclare la base de données utilisée

    try{

        $go_bdd = new PDO('mysql:host=localhost;dbname=voyage;charset=utf8','root','');
    }

    catch (Exception $e){

        die('Erreur : '. $e->getMessage());

    }

    // on récupere les données "mail" et "password" de la base de données


    $sql = 'SELECT * FROM users WHERE mail = :mail ';

    $request = $go_bdd->prepare($sql);


    // on execute la requete

    $request->execute([

        ':mail' => htmlentities(strip_tags($mail))
        
    ]);

    if($user = $request->fetch()){

        if (password_verify($pwd, $user['password'])) {
            $_SESSION['mail']=$mail;
            header('Location: index.php');
        }
        else {
            echo 'Mot de passe invalide';
        }
    }

}

?>
    
    <form action="formloggin.php" name="logg" id="form" method="post">

        <p> CONNEXION </p>
        <input type="text" name="mail" id="mail">
        <input type="password" name="pwd" id="pwd">
        <input type="submit" name="loggin" value="VALIDER" id="loggin">

    </form>


    
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