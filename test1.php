<?php
//pagination
@$page=$_get["page"];
if (empty($page)) $page=1
$nb_element_par_page=10;
$nb_de_page=ciel($tcount[0]["cpt"]/$nb_element_par_page);
$debut=($page-1)*$nb_element_par_page;


if(count($tab)==0)
    header("location:./");
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  ...
<div>
    <?php
    // tri 1
function init_tab(){
    $tab = array();
    for (i=0; $i<15; $i++){
        $tab[$i] = rand(0, 100);
    }
    return $tab;
}
function bubblesort ($tab){
    for ($i=0; $i<14; $i++){
        for ()
    }
}
?>
</div>
<div>
    <?php
    // tri 2
    pour i <- longueur (tab)-1 a 1 pa -1
        pour j <- 1 a i
            si tab[j] > tab[j+1] alors
                tmp <- tab[j]
                tab[j] <- tab[j+1]
                tab[j+1] <- tmp

?>
</div>
    // tri 3
<div>
    <?php
    <table class= "table table-bordered table-striped"> ==$0
        <thead>
            <tr>
            <th class="top-th"></th>
            </tr>
        </thead>
        $conn = new admin($id, $prenom, $nom, $login, $pass);
?>
</div>
    <div>
    <?php
    // mise en place pagination
    for ($i=1;$1<=$nb_de_page;$i++){
        if ($page!=$i)
            echo "<a href='?page=$i'>$i</a>"
        else
            echo "<a>$i</a>"
    }
    ?>
</div>
</body>
</html>