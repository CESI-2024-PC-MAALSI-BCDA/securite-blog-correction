<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    <strong class="font-bold">⚠️ Avertissement pédagogique</strong>
    <p class="mt-2 text-sm">
        Ce site a été conçu intentionnellement avec des failles de sécurité dans un but éducatif.
        <strong>Ne vous connectez pas avec de véritables identifiants</strong> et ne communiquez <strong>aucune donnée personnelle</strong>.
        Ne naviguez pas sur ce site en environnement non sécurisé ou en dehors d’un cadre pédagogique encadré.
    </p>
</div>
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
