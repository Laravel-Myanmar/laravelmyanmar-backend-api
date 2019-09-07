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
     * @return array
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

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
}
