<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Créer un nouveau compte</h2>
    <form action="?action=create" method="POST">
        <div class="mb-3">
            <label for="rib" class="form-label">RIB :</label>
            <input type="text" class="form-control" id="rib" name="rib" required>
        </div>
        <div class="mb-3">
            <label for="compte" class="form-label">Type de compte :</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="mb-3">
            <label for="solde" class="form-label">Solde :</label>
            <input type="text" class="form-control" id="solde" name="solde" required>
        </div>
        <select class="form-control" id="id_client" name="id_client" required>
            <option value="">Sélectionner un client</option>
            <?php foreach ($clients as $client): ?>
                <option value="<?= htmlspecialchars($client['id']) ?>">
                    <?= htmlspecialchars($client['nom'] . ' ' . $client['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
