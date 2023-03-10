<?php require('actions/db.php');
require('actions/objets/currencyToDecimalFct.php');
?>

<?php


    
    //Pour vérifier si le formulaire a bien été cliqué
    
    if(isset($_POST['validate'])){
        
        
        if(!empty($_POST['prix']) AND $_POST['prix']>=0){
            
            if(!empty($_GET['id_temp_vente'])){
                
                $id_temp_vente = $_GET['id_temp_vente'];
            
                // On récupère les données du formulaire de prix
            
                $prixOfObjet = currencyToDecimal($_POST['prix'])*100;
                
                //On récupère les données de l'objet
                
                $nom_objet = $_POST['nom'];
                $categorie_objet = $_POST['type'];
                $souscat = $_POST['souscategorie'];
                
                //On récupère les données du vendeur
                
                $nomVendeur = $_SESSION['nom'];
                $idVendeur = $_SESSION['id'];
                
                $date_achat = date('d/m/Y');
                
            
                
                //On insère l'objet dans la db ticketdecaissetemp
                
                $insertObjetInTicket = $db -> prepare('INSERT INTO ticketdecaissetemp(id_temp_vente, nom_vendeur, id_vendeur, nom, categorie, souscat, prix) VALUES(?,?,?,?,?,?,?)');
                $insertObjetInTicket -> execute(array($id_temp_vente, $nomVendeur, $idVendeur, $nom_objet, $categorie_objet, $souscat, $prixOfObjet));
                
                
                //On redirige vers la page objets collectés.
 
                header('location:objetsVendus.php?nbrobjet='.$NbrObjetDeTC.'&id_temp_vente='.$id_temp_vente.'');
            }
            else{
                $message = 'Un problème est survenu concernant l\'id de la vente';
            }
        }else{
            $message = 'Veuillez remplir le champ NOM et/ou le champ PRIX ou mettre 0 dans PRIX si vous donnez l\'objet, svp';   
        }
    }
        
