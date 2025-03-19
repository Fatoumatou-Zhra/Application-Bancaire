<?php require_once __DIR__.'/templates/header.php'?>

<h1>Liste des clients</h1>
    <?php if (!empty($clients)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client['nom']); ?></td>
                        <td><?php echo htmlspecialchars($client['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                        <td><?php echo htmlspecialchars($client['telephone']); ?></td>
                        <td><?php echo htmlspecialchars($client['adresse']); ?></td>
                        <td>
                        <a href="?id=<?= $task['id'] ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="?id=<?= $task['id'] ?>&action=supprimer" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                            Supprimer
                        </a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Aucun client trouvé.</p>
    <?php endif; ?>
<?php require_once __DIR__.'/templates/footer.php' ?>