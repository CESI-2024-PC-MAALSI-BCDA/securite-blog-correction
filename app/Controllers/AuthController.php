<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username && $password) {
                $user = new User();
                $user->create($username, $password);
                set_flash('success', 'Inscription réussie, vous pouvez vous connecter.');
                header(REDIRECT_HEADER . base_url('auth/login'));
                exit;
            }
        }

        $this->render('auth/register');
    }

    public function login()
    {
        $error = null;

        if ($_SESSION['user']) {
            set_flash('error', 'Vous êtes déjà connecté.');
            header(REDIRECT_HEADER . base_url());
            exit;
        }

        if (isset($_SESSION['blocked_until']) && time() < $_SESSION['blocked_until']) {
            $seconds = $_SESSION['blocked_until'] - time();
            set_flash('error', "Trop de tentatives. Réessayez dans $seconds seconde(s).");
            $this->render('auth/login', ['error' => $error]);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $log = "[" . date('Y-m-d H:i:s') . "] Tentative de login : user=$username, pass=$password\n";
            file_put_contents(__DIR__ . '/../../logs/login.log', $log, FILE_APPEND);

            $user = new User();
            $result = $user->login($username, $password);

            if ($result) {
                $_SESSION['user'] = $result;
                $_SESSION['user_role'] = $result['role'];
                set_flash('success', 'Connexion réussie !');
                header(REDIRECT_HEADER . base_url());
                exit;
            } else {
                set_flash('error', 'Identifiants invalides');
                $_SESSION['attempts'] = ($_SESSION['attempts'] ?? 0) + 1;
                if ($_SESSION['attempts'] >= 5) {
                    $_SESSION['blocked_until'] = time() + 60; // 60 seconds to test
                    $_SESSION['attempts'] = 0;
                    set_flash('error', 'Trop de tentatives. Réessayez dans 1 minute.');
                } else {
                    sleep(2);
                }
            }
        }

        $this->render('auth/login', ['error' => $error]);
    }


    public function logout()
    {
        set_flash('success', 'Vous avez été déconnecté.');
        session_destroy();
        header(REDIRECT_HEADER . base_url());
        exit;
    }
}
