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
//                setcookie('user_role', $result['role'], time() + 3600, '/');
                set_flash('success', 'Connexion réussie !');
                header(REDIRECT_HEADER . base_url());
                exit;
            } else {
                set_flash('error', 'Identifiants invalides');
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
