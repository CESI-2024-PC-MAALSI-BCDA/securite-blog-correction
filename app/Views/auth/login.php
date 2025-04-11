<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Connexion</h2>
    <?php if (!empty($error)) : ?>
        <div class="text-red-600 mb-4"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <input class="w-full p-2 mb-3 border" type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input class="w-full p-2 mb-3 border" type="password" name="password" placeholder="Mot de passe" required>
        <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Se connecter</button>
    </form>
</div>
</body>
</html>
