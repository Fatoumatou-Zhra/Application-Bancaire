<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php if (!empty($comptes)):  ?>
    <div class="container mt-5">
    <h2 class="mb-4">🏦 Liste des comptes</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>RIB</th>
                <th>Solde</th>
                <th>Client</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comptes as $compte): ?>
                <tr>
                    <td><?= htmlspecialchars($compte['id']) ?></td>
                    <td><?= htmlspecialchars($compte['rib']) ?></td>
                    <td><?= htmlspecialchars($compte['solde']) ?></td>
                    <td><?= htmlspecialchars($compte['nom']) ?> <?= htmlspecialchars($compte['prenom']) ?></td>
                    <td><?= htmlspecialchars($compte['type_compte']) ?></td>
                    <td>
                        <a href="?id=<?= $compte['id'] ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="?id=<?= $compte['id'] ?>&action=supprimer" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <p style="text-align: center;">Aucun compte trouvé.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>