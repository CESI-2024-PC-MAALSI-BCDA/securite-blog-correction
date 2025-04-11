<?php

namespace App\Controllers;

use App\Core\Controller;

class ToolsController extends Controller
{
    public function fetch(): void
    {
        $url = $_GET['url'] ?? null;

        if (!$url) {
            echo "<p class='text-red-600'>Aucune URL fournie</p>";
            return;
        }

        // 💣 SSRF vulnérable
        $content = @file_get_contents($url);

        echo "<h2 class='text-xl font-bold mb-4'>Résultat pour : <code>" . htmlspecialchars($url) . "</code></h2>";
        echo "<div class='bg-gray-100 p-4 text-sm font-mono overflow-auto'>" . htmlspecialchars($content) . "</div>";
    }

    public function hash(): void
    {
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = $_POST['text'] ?? '';
            $algo = $_POST['algo'] ?? 'md5';

            if ($text && in_array($algo, ['md5', 'sha1', 'sha256', 'bcrypt'])) {
                switch ($algo) {
                    case 'md5':
                        $result = md5($text);
                        break;
                    case 'sha1':
                        $result = sha1($text);
                        break;
                    case 'sha256':
                        $result = hash('sha256', $text);
                        break;
                    case 'bcrypt':
                        $result = password_hash($text, PASSWORD_BCRYPT);
                        break;
                    default:
                        $result = 'Algorithme non supporté.';
                }
            }
        }

        $this->render('tools/hash', ['result' => $result]);
    }

}
