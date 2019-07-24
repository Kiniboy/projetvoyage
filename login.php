<?php
session_start();






// TEST




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

        

        if (password_verify($pwd, password_hash($pwd, PASSWORD_DEFAULT))) {

            echo 'Mot de passe valide';
            header('Location: index.php');



        }
        else {

            echo 'Mot de passe invalide';
            header('Location: formloggin.php');
            


        }
    }

}




// inserer verification si déja connecté 

// if(isset($_SESSION['mail'])){
//     echo 'bon retour parmis nous';
// }


// // verifier la connexion de l'utilisateur

// elseif (isset($_POST['mail']) && isset($_POST['pwd']) && $_POST['mail'] == 'mail' && $_POST['pwd'] == 'kangourou') {

//      $_SESSION['mail'] = $_POST['mail'];

//     echo 'Bienvenue';


// SI ERROR    

//     else {

//         echo 'error mail or passsword';
//         header('Location: ./main.php?message=Impossible%20de%20se%20connecter');
//     }

// }


?>

