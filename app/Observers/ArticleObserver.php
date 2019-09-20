<?php

namespace App\Observers;

use Hashids\Hashids;
use Ramsey\Uuid\Uuid;
use App\Modules\Articles\Models\Article;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $uuid = Uuid::uuid4();
        $id = $uuid->toString();
        $hashids = new Hashids($id);
        $slug = str_slug($article->title, '-');
        $article->slug = $slug . "-" . $hashids->encode(1, 2, 3);
    }
    public function updating(Article $article)
    {
    }
}
