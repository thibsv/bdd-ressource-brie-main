<!-- Edit -->
<div class="modal fade" id="edit_<?php echo htmlspecialchars($row['ID']); ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../Modele/admin/edit.php?ID=<?php echo htmlspecialchars($row['ID']); ?>">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">prenom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">adresse</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="adresse" value="<?php echo htmlspecialchars($row['adresse']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">naissance</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="naissance" value="<?php echo htmlspecialchars($row['naissance']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">tel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" value="<?php echo htmlspecialchars($row['tel']); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mail" value="<?php echo htmlspecialchars($row['mail']); ?>">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" name="edit" class="btn btn-primary">Modifier</a>
                    </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo htmlspecialchars($row['ID']); ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Supprimer </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center"> supprimer ?</p>
                <h2 class="text-center"><p>Logement:</p> <?php echo htmlspecialchars($row['Logements']); ?></h2>
                <h2 class="text-center"><p>Restauration:</p> <?php echo htmlspecialchars($row['Type_Resto']); ?></h2>
                <h2 class="text-center"><p>Animation:</p> <?php echo htmlspecialchars($row['Nom_Anim']); ?></h2>
                <h2 class="text-center"><p>Region:</p> <?php echo htmlspecialchars($row['Nom_Region']); ?></h2>
                <h2 class="text-center"><p>Ménage:</p> <?php echo htmlspecialchars($row['Menage']); ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <a href="../Modele/admin_res/delete.php?ID=<?php echo htmlspecialchars($row['ID']); ?>" class="btn btn-danger"> Oui</a>
            </div>
        </div>
    </div>
</div>
