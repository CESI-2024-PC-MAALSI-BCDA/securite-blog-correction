<h2 class="text-3xl font-bold mb-6">📬 Page de contact</h2>

<form method="POST" class="space-y-4 max-w-xl">
    <div>
        <label for="name" class="block font-semibold mb-1">Nom</label>
        <input type="text" name="name" id="name" required class="w-full p-2 border rounded">
    </div>
    <div>
        <label for="email" class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" id="email" required class="w-full p-2 border rounded">
    </div>
    <div>
        <label for="message" class="block font-semibold mb-1">Message</label>
        <textarea name="message" id="message" rows="5" required class="w-full p-2 border rounded"></textarea>
    </div>

    <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Envoyer
    </button>
</form>
