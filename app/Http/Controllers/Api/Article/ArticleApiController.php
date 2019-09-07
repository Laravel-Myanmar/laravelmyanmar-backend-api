<?php

namespace App\Http\Controllers\Api\Article;

use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Articles\Models\Article;
use App\Modules\Articles\Requests\StoreArticle;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Modules\Articles\Transformers\ArticleShowTransformer;
use App\Modules\Articles\Transformers\ArticleIndexTransformer;

class ArticleApiController extends Controller
{
    /**
     * Show all articles.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(20);

        $articles = Fractal::create()
            ->collection($articles->getCollection())
            ->transformWith(new ArticleIndexTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($articles))
            ->toArray();

        return response($articles, 200, ['msg' => 'Article index successfully loaded']);
    }

    /**
     * Store a new article.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $validated = $request->validated();
        $article = Article::create($validated);

        $article = Fractal::create()
            ->item($article)
            ->transformWith(new ArticleShowTransformer())
            ->toArray();

        return response($article, 201, ['msg' => 'Article store successfully loaded']);
    }
}