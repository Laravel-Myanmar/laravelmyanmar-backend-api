<?php

namespace App\Http\Controllers\Api\Article;

use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Articles\Models\Article;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Modules\Articles\Transformers\ArticleIndexTransformer;

class ArticleApiController extends Controller
{
    /**
     * Show all articles.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function index()
    {
        $articles = Article::paginate(20);

        $articles = Fractal::create()
                    ->collection($articles->getCollection())
                    ->transformWith(new ArticleIndexTransformer())
                    ->paginateWith(new IlluminatePaginatorAdapter($articles))
                    ->toArray();

        return response($articles, 200, ['msg' => 'Article index successfully loaded']);
    }

    /**
     * Store a new article
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function store(Request $request)
    {
        // Use form request to validate (https://laravel.com/docs/6.0/validation#form-request-validation)
        // Don't use request all, use request->only
        // Use Fractal to respond the article
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
}
