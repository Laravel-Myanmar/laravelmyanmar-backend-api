<?php

namespace App\Http\Controllers\Api\Article;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    /**
     * Show all articles.
     *
     * @param Request $request
     *
     * @return array
     */
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
}