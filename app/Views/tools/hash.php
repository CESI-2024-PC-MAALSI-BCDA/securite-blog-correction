<h2 class="text-3xl font-bold mb-6">🔐 Générateur de hash</h2>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label for="text" class="block font-semibold mb-1">Texte à hasher</label>
        <input type="text" name="text" id="text" required class="w-full p-2 border rounded">
    </div>

    <div>
        <label for="algo" class="block font-semibold mb-1">Algorithme</label>
        <select name="algo" id="algo" class="w-full p-2 border rounded">
            <option value="md5">MD5</option>
            <option value="sha1">SHA1</option>
            <option value="sha256">SHA256</option>
            <option value="bcrypt">Bcrypt</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Générer le hash
    </button>
</form>

<?php if ($result): ?>
    <div class="mt-6 p-4 bg-gray-100 border rounded">
        <p class="font-semibold text-gray-700">Hash généré :</p>
        <pre class="break-all text-sm"><?= htmlspecialchars($result) ?></pre>
    </div>
<?php endif; ?>
