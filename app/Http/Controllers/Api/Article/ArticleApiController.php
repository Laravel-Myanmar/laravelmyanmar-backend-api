<?php

namespace App\Http\Controllers\Api\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleApiController extends Controller
{
    /**
     * Show all articles
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        return [
            'data' => [
                'hello' => 'World'
            ]
        ];
    }
}
