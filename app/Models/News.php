<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'text'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'news_to_categories', 'news_id', 'category_id','id');
    }

}
