<?php

namespace App\Modules\Articles\Transformers;

use League\Fractal\TransformerAbstract;
use App\Modules\Articles\Models\Article;

class ArticleIndexTransformer extends TransformerAbstract
{
    /**
     * Transform articles to an array
     *
     * @param Article $article
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => (int) $article->id,
            'title' => $article->title,
            'body' => $article->body,
            'created_at' => $article->created_at->toDateTimeString(),
        ];
    }
}
