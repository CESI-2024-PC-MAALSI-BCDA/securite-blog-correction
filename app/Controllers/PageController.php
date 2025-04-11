<?php

namespace App\Controllers;

use App\Core\Controller;

class PageController extends Controller
{
    public function show(): void
    {
        $page = $_GET['page'] ?? 'home';

        // 💥 Inclusion LFI vulnérable (aucun filtrage, pas de whitelist)
        $file = __DIR__ . '/../Views/pages/' . $page . '.php';

        if (file_exists($file)) {
            include_once $file;
        } else {
            echo "<p class='text-red-600 font-semibold'>Page non trouvée</p>";
        }
    }

    public function contact(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';

            if (!verify_csrf_token($token)) {
                set_flash('error', 'Jeton CSRF invalide.');
                header(REDIRECT_HEADER . base_url('page/contact'));
                exit;
            }

            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');

            if (!$name || !$email || !$message) {
                set_flash('error', 'Tous les champs sont requis.');
            } else {
                $log = "[" . date('Y-m-d H:i:s') . "] Contact : $name <$email> : $message\n";
                file_put_contents(__DIR__ . '/../../logs/contact.log', $log, FILE_APPEND);
                set_flash('success', 'Votre message a été envoyé avec succès.');
                header(REDIRECT_HEADER . base_url('page/contact'));
                exit;
            }
        }

        $this->render('pages/contact');
    }
    public function apropos(): void
    {
        $this->render('pages/apropos');
    }

    public function mentions(): void
    {
        $this->render('pages/mentions');
    }
}
