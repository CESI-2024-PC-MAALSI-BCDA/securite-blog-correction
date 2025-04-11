<h2 class="text-3xl font-bold mb-6">Gestion des utilisateurs</h2>

<table class="table-auto w-full border">
    <thead>
    <tr class="bg-gray-100">
        <th class="px-4 py-2 text-left">ID</th>
        <th class="px-4 py-2 text-left">Nom d'utilisateur</th>
        <th class="px-4 py-2 text-left">Rôle</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
        <tr class="border-t">
            <td class="px-4 py-2"><?= $u['id'] ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($u['username']) ?></td>
            <td class="px-4 py-2"><?= $u['role'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
