<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Modifier le compte</h2>
    <form action="?action=update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($compte['id']) ?>">
        <div class="mb-3">
            <label for="rib" class="form-label">RIB :</label>
            <input type="text" class="form-control" id="rib" name="rib" value="<?= htmlspecialchars($compte['rib']) ?>" required>
        </div>
        <div class="mb-3">
        <select class="form-control" id="type_compte" name="type_compte" required>
        <option value="courant" <?= isset($compte) && $compte['type_compte'] == 'courant' ? 'selected' : '' ?>>Compte courant</option>
        <option value="épargne" <?= isset($compte) && $compte['type_compte'] == 'épargne' ? 'selected' : '' ?>>Compte épargne</option>
    </select>
        </div>
        <div class="mb-3">
            <label for="solde" class="form-label">Solde :</label>
            <input type="text" class="form-control" id="solde" name="solde" value="<?= htmlspecialchars($compte['solde']) ?>" required>
        </div>
        
    <div class="mb-3">
        <label for="id_client" class="form-label">Client :</label>
        <select class="form-control" id="id_client" name="id_client" required>
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['id'] ?>" <?= ($compte['id_client'] == $client['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($client['nom'] . ' ' . $client['prenom']) ?>
                </option>
            <?php endforeach; ?>
    </select>
    </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    <a href="?id=<?= htmlspecialchars($compte['id']) ?>&action=voir" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
