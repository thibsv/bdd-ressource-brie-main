<?php
session_start();
include_once('../conn_db.php');

if (isset($_POST['edit'])) {
    //connection
    $database = new Connection();
    $db = $database->open();
    try {
        //création des variables 
        $id = $_GET['id'];
        $prenom = $_POST['prenom'];
        $Client_ID = $_POST['nom'];
        $Restauration_ID = $_POST['adresse'];
        $Animation_ID = $_POST['naissance'];
        $Region_ID = $_POST['tel'];
        $Menage = $_POST['mail'];

        //preparer la sql injection pour la table
        $sql = "UPDATE menbres SET id = '$id, prenom = '$prenom', nom  = '$nom', adresse  = '$adresse', naissance = '$naissance', tel = '$tel ', mail ='$mail'";
        //excecuter l'injection sql instruction if-else dans l'exécution de notre requête
        $_SESSION['message'] = ($db->exec($sql)) ? ' mis à jour avec succès' : 'Une erreur est survenue.';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    //close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Remplissez en premier le formulaire de modification';
}

header('location: ../admin.php');
