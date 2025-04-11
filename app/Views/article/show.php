<h1 class="text-3xl font-bold mb-4"><?= $article['title'] ?></h1>
<p class="text-gray-600 text-sm mb-4">Par <?= htmlspecialchars($article['username']) ?> le <?= date('d/m/Y à H:i', strtotime($article['created_at'])) ?></p>
<div class="prose max-w-none">
    <?= $article['content'] ?>
</div>
