<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
        
        <?php
    $database = new Connection();
    $db = $database->open();
        $stmt = $db->prepare("select all from membres adresse order by adresse");
        $_SESSION['message'] = ($stmt->execute(array(':id' => $_POST['id'], ':prenom' => $_POST['prenom'], ':nom' => $_POST['nom'], ':adresse' => $_POST['adresse'], ':naissance' => $_POST['naissance'], ':tel' => $_POST['tel'], ':mail' => $_POST['mail'],))) ;
?>
    </head>
    
    <body>
        <?php
    <table class="table table-bordered table-striped">
                    <thead>
                        <th class="top-th"><a href="id.php">Id</a></th>
                        <th class="top-th"><a href="prenom.php">prenom</a></th>
                        <th class="top-th"><a href="nom.php">nom</a></th>
                        <th class="top-th"><a href="adresse.php">adresse</a></th>
                        <th class="top-th"><a href="naissance.php">naissance</a></th>
                        <th class="top-th"><a href="tel.php">tel</a></th>
                        <th class="top-th"><a href="mail.php">mail</a></th>
                    </thead>
                    
                    ?>

    </body>
</html>