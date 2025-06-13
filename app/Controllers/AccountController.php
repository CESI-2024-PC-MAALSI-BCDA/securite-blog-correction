<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use JetBrains\PhpStorm\NoReturn;

class AccountController extends Controller
{
    #[NoReturn]
    public function delete(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            set_flash('error', 'ID manquant');
            header(REDIRECT_HEADER . base_url());
            exit;
        }

        $user = new User();
        $user->delete($id);

        set_flash('success', "Compte supprimé avec succès (id $id)");
        header(REDIRECT_HEADER . base_url());
        exit;
    }
}
