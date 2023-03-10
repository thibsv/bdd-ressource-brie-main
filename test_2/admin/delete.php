<?php
    session_start();
    include('../conn_db.php');

    if(isset($_GET['id'])){
        //connection
        $database = new Connection();
        $db = $database->open();
        try{
            //preparer la sql injection pour la table animation
            $sql = "DELETE FROM menbre WHERE ID = '".$_GET['id']."'";
            //excecuter l'injection sql instruction if-else dans l'exécution de notre requête
            $_SESSION['message'] = ( $db->exec($sql) ) 'supprimé avec succès' : 'Une erreur est survenue.   ';
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        //close connection
        $database->close();
    }
    else{
    $_SESSION['message'] = 'erreur';
    }

    header('location: ../admin.php');
