<?php

namespace App\Modules\Articles\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body'];
}
