<?php

session_start();

if(isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['image'])){

    $title= $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];



}



// on déclare la base de données utilisée

try{

    $go_bdd = new PDO('mysql:host=localhost;dbname=voyage;charset=utf8','root','');
}

catch (Exception $e){

    die('Erreur : '. $e->getMessage());

}

// on insert les valeurs dans la base de données

$sql = 'INSERT INTO voyages VALUES (NULL, :title, :content, :image)';

// execution de la requete

$request = $go_bdd->prepare($sql);

$request->execute([

    ':title' => $title,
    ':content' => $content,
    ':image' => $image

]);


if (isset($_FILES['image'])){
    var_dump($_FILES);

    // test pour savoir si le fichier n'est pas trop gros

    // if ($_FILES['image']['size'] >= 1000000) {
        
        $filedir = 'images/';
        $img= $filedir.$_FILES['image']['name'];
        $path = pathinfo($_FILES['image']['name']);
        $ext= strtolower($path['extension']);
        $extension_autorisees = array('jpg','jpeg','png','gif');

        if(in_array($ext, $extension_autorisees)){

            //on peut stocker le fichier définitivement

            move_uploaded_file( $_FILES['image']['tmp_name'], $img . 
            basename($_FILES['image']['name']));

            echo "Le fichier à bien été envoyé !";
        }

        
    // }

}





//header('Location: index.php');



