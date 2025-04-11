<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AccountController extends Controller
{
    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            set_flash('error', 'ID manquant');
            header(REDIRECT_HEADER . base_url());
            exit;
        }

        $user = new User();
        $user->delete($id); // ❌ aucune vérif que c'est le bon utilisateur

        set_flash('success', "Compte supprimé avec succès (id $id)");
        header(REDIRECT_HEADER . base_url());
        exit;
    }
}
