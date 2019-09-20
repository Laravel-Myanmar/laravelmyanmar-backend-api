<?php

namespace App\Modules\Articles\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'preview', 'description'];
}
