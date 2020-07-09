<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function getAllCategories()
    {
        return \DB::select("SELECT id, name FROM categories");
    }
    public function getFindCategories(int $id)
    {
        return \DB::table($this->table)->where('id', $id)->first();
    }
}
