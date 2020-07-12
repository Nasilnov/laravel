<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsToCategory extends Model
{
    protected $table = 'news_to_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'news_id'
    ];
}
