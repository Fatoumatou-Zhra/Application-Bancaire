<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails du client</h2>
    <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
    <p><strong>Prénom :</strong> <?= htmlspecialchars($client['prenom']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($client['email']) ?></p>
    <p><strong>Téléphone :</strong> <?= htmlspecialchars($client['telephone']) ?></p>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($client['adresse']) ?></p>

    <a href="?id=<?= htmlspecialchars($client['id']) ?>&action=modifier" class="btn btn-warning">Modifier</a>
    <a href="?" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
