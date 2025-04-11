<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class SearchController extends Controller
{
    public function index()
    {
        $results = [];
        $query = $_GET['q'] ?? '';

        if ($query) {
            $article = new Article();
            $results = $article->search($query); // vulnérable
        }

        $this->render('search/index', [
            'query' => $query,
            'results' => $results
        ]);
    }
}
