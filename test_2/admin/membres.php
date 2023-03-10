<?php
include_once('../conn_db.php');

$database = new Connection();
$db = $database->open();
try {
    $sql = 'SELECT * FROM membres';
    foreach ($db->query($sql) as $row) {
?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['prenom']); ?></td>
            <td><?php echo htmlspecialchars($row['nom']); ?></td>
            <td><?php echo htmlspecialchars($row['adresse']); ?></td>
            <td><?php echo htmlspecialchars($row['naissance']); ?></td>
            <td><?php echo htmlspecialchars($row['tel']); ?></td>
            <td><?php echo htmlspecialchars($row['mail']); ?></td>

            <td class="td-edit-delete">
                <a href="#edit_<?php echo htmlspecialchars($row['id']); ?>" class="btn-edit" data-bs-toggle="modal"> Modifier</a>
                <a href="#delete_<?php echo htmlspecialchars($row['id']); ?>" class="btn-delete" data-bs-toggle="modal"> Supprimer</a>
            </td>
            <?php include('../edit_delete.php'); ?>
        </tr>
<?php
    }
} catch (PDOException $e) {
    echo 'Il y a un problème de connexion :' . $e->getMessage();
}
//close connection
$database->close();
?>