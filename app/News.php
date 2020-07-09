<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function getAllNews()
    {
        return\DB::table($this->table)->get();
    }
    public function getFindNews(int $id)
    {
        return \DB::table($this->table)->where('id', $id)->first();
    }

    public function updateNews($news, $id)
    {
       return \DB::table($this->table)->where('id', $id)->update($news);

    }

    public function addNews($news)
    {
        return \DB::table($this->table)->insertGetId($news);
    }
}
