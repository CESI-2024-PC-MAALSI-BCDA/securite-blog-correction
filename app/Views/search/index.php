<h2 class="text-3xl font-bold mb-6">Recherche d'articles</h2>

<form method="GET" action="<?= base_url('search') ?>" class="mb-6">
    <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Entrez un mot-clé"
           class="w-full p-3 border rounded" />
</form>

<?php if ($query && empty($results)): ?>
    <p class="text-gray-500">Aucun résultat trouvé pour "<?= htmlspecialchars($query) ?>"</p>
<?php endif; ?>

<?php foreach ($results as $a): ?>
    <div class="mb-6 border-b pb-4">
        <h3 class="text-xl font-semibold text-blue-700">
            <a href="<?= base_url('article/show&id=' . $a['id']) ?>"><?= $a['title'] ?></a>
        </h3>
        <p class="text-gray-600 text-sm">Par <?= htmlspecialchars($a['username']) ?> le <?= date('d/m/Y', strtotime($a['created_at'])) ?></p>
    </div>
<?php endforeach; ?>
