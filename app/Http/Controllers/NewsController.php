<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
//use App\Models\NewsToCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     public function category()
    {
        return view('news.category', ['category' => Category::all()]);
    }

    public function categoryId($id)
    {
        return view('news.category_id', [
            'news' => Category::query()->find($id)->news()->paginate(5),
            'id' => $id
        ]);
    }

    public function newsId(int $id)
    {
        $news = News::query()->where('id', $id)->first();
        return view('news.news_id', ['news' => $news, 'id' => $id] );
    }
//
}
