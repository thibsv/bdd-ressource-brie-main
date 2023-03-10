<?php require('actions/db.php');
require('actions/objets/currencyToDecimalFct.php');
?>

<?php


    //Pour vérifier si le formulaire a bien été cliqué
    
    if(isset($_POST['validate'])){
        
        if(!empty($_POST['numero']) AND !empty($_POST['banque'])){
            
            
            
            $getAllObjetOfTicket = $db -> prepare('SELECT * FROM ticketdecaissetemp WHERE id_temp_vente = ?');
            $getAllObjetOfTicket -> execute(array($_GET['id_temp_vente']));
            
            //FETCH_ASSOC retourne un tableau multidimensionnel avec des clefs associatives
            $getObjets = $getAllObjetOfTicket -> fetchAll(PDO::FETCH_ASSOC);

            date_default_timezone_set('Europe/Paris');
            $date_achat = new DateTime('now', new DateTimeZone('Europe/paris'));
            $date_achat = $date_achat->format('Y/m/d G:i');
            
             //On remplit la bdd ticketdecaisse
                
                $moyenDePaiement = $_POST['paiement'];
                $nomVendeur = $_SESSION['nom'];
                $idVendeur = $_SESSION['id'];
                $prenomVendeur = $_SESSION['prenom'];
                $numcheque = $_POST['numero'];
                $banque = $_POST['banque'];
                $nbrObjet = $_GET['nbrObjet'];
                
                
                    //pour cela on récupère le prix total
                $getPrixTotal = $db->prepare('SELECT SUM(prix) AS prix_total FROM ticketdecaissetemp WHERE id_temp_vente = ?');
                $getPrixTotal -> execute(array($_GET['id_temp_vente']));

                $getTotal = $getPrixTotal->fetch();
                $getTotalEnEuros = $getTotal['prix_total'];
                $lien = '...';
                    
                    //On insère.
                $insertDataDansTicketCaisse = $db-> prepare('INSERT INTO ticketdecaisse(nom_vendeur, id_vendeur, date_achat_dt, nbr_objet, moyen_paiement, num_cheque, banque, prix_total, lien) VALUES (?,?,?,?,?,?,?,?,?)');
                $insertDataDansTicketCaisse -> execute(array($nomVendeur, $idVendeur, $date_achat, $nbrObjet, $moyenDePaiement, $numcheque, $banque, $getTotalEnEuros, $lien));

                    //On récupère l'id du ticket de caisse
                    
                    $recupInfoTc = $db-> prepare('SELECT id_ticket, prix_total FROM ticketdecaisse WHERE id_vendeur = ? ORDER BY id_ticket DESC');
                    $recupInfoTc -> execute(array($idVendeur));
                    
                    $infoOfTicket = $recupInfoTc->fetch();
                    
                    $idOfThisTicket = $infoOfTicket[0];
                    $prixOfThisTicket = $infoOfTicket[1]/100;
                    
                     //On update le lien de la db ticketdecaisse.
                    $updatelien = $db->prepare('UPDATE ticketdecaisse SET lien = "tickets/Ticket'.$idOfThisTicket.'.txt" WHERE id_ticket = ?');
                    $updatelien -> execute(array($idOfThisTicket));
                    
                    //On ouvre un fichier texte
            
                    $fichier = fopen("tickets/Ticket$idOfThisTicket.txt", 'c+b');
                    $entete = "\t RESSOURCE'BRIE\r\t Association loi 1901\r\t RNA : W772010160\r\t Siret : 91221719700017 \r\r Ticket de caisse $idOfThisTicket\r Vendeur : $prenomVendeur \r date et heure : $date_achat \r\r";
                    fwrite($fichier, $entete);        
        
            //On fait une boucle pour chaque élément du ticket de caisse afin de les retirer de la bdd collectée et de les mettre dans la bdd vendus.
            foreach($getObjets as $v){
                
                $id_objet = $v['id'];
                $nom_vendeur = $v['nom_vendeur'];
                $id_vendeur = $v['id_vendeur'];
                $nom_objet = $v['nom'];
                $categorie_objet = $v['categorie'];
                $souscat_objet = $v['souscat'];
                $prix_objet = $v['prix'];
                $timestamp = time();
            

                //On insère l'objet dans la db objets vendus
            
                $insertObjetInDB = $db -> prepare('INSERT INTO objets_vendus(id_ticket, nom, nom_vendeur, id_vendeur, categorie, souscat, date_achat, timestamp, prix) VALUES (?,?,?,?,?,?,?,?,?)');
                $insertObjetInDB -> execute(array($idOfThisTicket, $nom_objet, $nom_vendeur, $id_vendeur, $categorie_objet, $souscat_objet, $date_achat, $timestamp, $prix_objet));
                
                //On insère dans le fichier texte.
                
                $prix_objet_euros = $prix_objet/100;
                $contenu = "$nom_objet ... $categorie_objet ... $prix_objet_euros € \r\r";
                fwrite($fichier, $contenu);
                
                //On vide le ticket de caisse.
                
                $deleteFromTicketDeCaisse = $db -> prepare('DELETE FROM ticketdecaissetemp WHERE id = ?');
                $deleteFromTicketDeCaisse -> execute(array($id_objet));
            
                //On vide la db vente de la vente en cours.
                
                $supprFromDbVente = $db -> prepare('DELETE FROM vente WHERE id_temp_vente = ?');
                $supprFromDbVente -> execute(array($_GET['id_temp_vente']));
                
            }
            
                $fin = "\r Montant total = $prixOfThisTicket € \r Moyen de paiement = $moyenDePaiement \r numéro de chèque = $numcheque \r\r TVA non applicable, article 293B du Code général des impôts. \r\rMerci de votre visite et à bientôt :-)";
                fwrite($fichier, $fin);
                fclose($fichier);
                
                require('actions/objets/update_db_bilan.php');
                
                //On redirige vers la page objets collectés.
            
               header("location: ticketdecaisseapresvente.php?id_ticket=$idOfThisTicket");
            
        }else{
            $message = 'Veuillez remplir tous les champs svp.';
               
        }
    }
        
