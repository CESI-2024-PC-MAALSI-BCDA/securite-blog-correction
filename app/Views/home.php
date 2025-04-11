<h2 class="text-2xl font-bold mb-6">Articles récents</h2>

<?php
$articles = (new \App\Models\Article())->all();
foreach ($articles as $a): ?>
    <div class="mb-6 border-b pb-4">
        <h3 class="text-xl font-semibold text-blue-700">
            <a href="<?= base_url('article/show&id=' . $a['id']) ?>"><?= $a['title'] ?></a>
        </h3>
        <p class="text-gray-600 text-sm">Par <?= htmlspecialchars($a['username']) ?> le <?= date('d/m/Y', strtotime($a['created_at'])) ?></p>
        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['id'] == $a['user_id']): ?>
            <a href="<?= base_url('article/edit&id=' . $a['id']) ?>" class="text-sm text-yellow-600 hover:underline ml-2">Modifier</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
