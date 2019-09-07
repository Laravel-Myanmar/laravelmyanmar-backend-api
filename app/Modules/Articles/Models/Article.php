<?php

namespace App\Modules\Articles\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** Article Model
     * @var array
     */
    protected $fillable = ['title', 'body'];
}
