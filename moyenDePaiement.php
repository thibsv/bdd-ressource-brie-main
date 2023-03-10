<?php
require('actions/users/securityAction.php');
require('actions/objets/moyenDePaiementAction.php');

?>

<!DOCTYPE HTML>

<html lang="fr-FR">
    <?php include("includes/head.php");?>
    <body>
        <?php
            $lineheight = "uneligne";
            $src = 'image/PictoFete.gif';
            $alt = 'un oiseau qui fait la fête.';
            $titre = 'Insérez le moyen de paiement';
            include("includes/header.php");
            $page = 2;
            include("includes/nav.php");
            ?>
            
            
            <?php
            if($_SESSION['admin'] >= 1){
            ?>
        
        <h2 style='text-align: center;'>Prix total = <?= $_GET['prix']?> €</h2>

        <form method="post">
                
                <fieldset>
                    
            
                    <label for="paiement">Moyen de Paiement : </label>
                    <select id="paiement" name="paiement">
                        <option value="espece">Espèce</option>
                        <option value="carte">Carte</option>
                        <option value="cheque">Chèque</option>
                        <option value="mixte">Mixte</option>
                    </select>
                
                </fieldset>
                
                <fieldset>
            
                    <label for="client">Montant donné par le client : (remplir seulement si paiement espèce) </label>
                    <input type="text" name="client">
                
                </fieldset>
                
                <?php if(isset($message)){
                ?>
                <p style='text-align: center; color: red;'>ATTENTION : <?=$message?></p>
                <?php
                }
                ?>
            
                <input type="submit" name="validate" value="Valider">
                <a href="objetsVendus.php?id_temp_vente=<?=$_GET['id_temp_vente']?>" class="stdbouton">Retour</a>
                
        </form>
        
       
        
        
        <?php
            }else{
                echo 'Vous n\'êtes pas administrateur, veuillez contacter le webmaster svp';
            }
            include('includes/footer.php');
            ?>
    </body>
</html>