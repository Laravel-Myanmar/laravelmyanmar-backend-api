<?php

namespace App\Http\Controllers\Api\Article;

use Spatie\Fractal\Fractal;
use Illuminate\Http\Request;
use App\Modules\Articles\Models\Article;
use App\Http\Controllers\Api\BaseApiController;
use App\Modules\Articles\Requests\StoreArticle;
use App\Modules\Articles\Requests\UpdateArticle;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Modules\Articles\Transformers\ArticleShowTransformer;
use App\Modules\Articles\Transformers\ArticleIndexTransformer;

class ArticleApiController extends BaseApiController
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

        return $this->respond($articles, 200, 'Retrieve Articles successfully.');
    }

    /**
     * Store a new article.
     *
     * @param StoreArticle $request
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

        return $this->respond($article, 201, 'Created Article successfully');
    }

    /**
     * Show an article
     *
     * @param Article $article
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Fractal::create()
            ->item($article)
            ->transformWith(new ArticleShowTransformer())
            ->toArray();

        return $this->respond($article, 200, 'Retrieve Article successfully.');
    }

    /**
     * Update  Article
     *
     * @param StoreArticle $request
     * @param Article $article
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(UpdateArticle $request, Article $article)
    {

        $validated = $request->validated();

        $article->update($validated);

        $article = Fractal::create()
            ->item($article)
            ->transformWith(new ArticleShowTransformer())
            ->toArray();

        return $this->respond($article, 200, 'Updated Article successfully.');
    }

    /**
     * Delete an Article
     *
     * @param Article $article
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return $this->respond(null, 204);
    }
}
