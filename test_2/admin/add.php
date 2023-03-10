<?php
session_start();
include_once('../conn_db.php');

if (isset($_POST['add'])) {
    //connection
    $database = new Connection();
    $db = $database->open();
    try {
        //preparer la sql injection pour la table animation
        $stmt = $db->prepare("INSERT INTO membres (id, prenom, nom, adresse, naissance, tel, mail) VALUES (:id, :prenom, :nom, :adresse, :naissance, :tel, :mail)");
        //excecuter l'injection sql instruction if-else dans l'exécution de notre requête
        $_SESSION['message'] = ($stmt->execute(array(':id' => $_POST['id'], ':prenom' => $_POST['prenom'], ':nom' => $_POST['nom'], ':adresse' => $_POST['adresse'], ':naissance' => $_POST['naissance'], ':tel' => $_POST['tel'], ':mail' => $_POST['mail'],))) ;
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    //close connection
    $database->close();
} else {
    $_SESSION['message'] = "Remplissez d'abord le formulaire d'ajout";
}
header('location: ../admin.php');
