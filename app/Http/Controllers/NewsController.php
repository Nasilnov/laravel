<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\CreateNewsRequest;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     public function category()
    {
        return view('news.category', ['category' => ((new Categories())->getAllCategories())]);
    }

    public function categoryId(int $id)
    {
       $newsArr = (new News())->getAllNews();
       return view('news.category_id',[
           'id' => $id,
           'news' => $newsArr
       ] );
    }

    public function newsId(int $id)
    {
        $news = (new News())->getFindNews($id);
        return view('news.news_id', ['news' => $news, 'id' => $id] );
    }

    public function newsEdit(int $id) {
        $news = (new News())->getFindNews($id);
        if (!$news) {
            return abort(404);
        }
        return view('news.edit', ['news' => $news, 'id' => $id] );
    }

    public function updateNews(CreateNewsRequest $request)
    {
        $id = $request->input('id');
        $news = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'text' => $request->input('text')
        ];

        (new News())->updateNews($news, $id );

        $news = (new News())->getFindNews($request->input('id'));
        if (!$news) {
            return abort(404);
        }

        return view('news.edit', ['news' => $news, 'id' => $request->input('id'), 'save' => '1']) ;
    }

    public function newsAdd(int $id) {
        $name = (new Categories())->getFindCategories($id)->name;

        return view('news.add', ['name' => $name, 'category_id' => $id] );
    }

    public function saveNews(CreateNewsRequest $request)
    {
        $news = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'text' => $request->input('text')
        ];

        $id = (new News())->addNews($news);
        $news = (new News())->getFindNews($id);
        if (!$news) {
            return abort(404);
        }
        return view('news.edit', ['news' => $news, 'id' => $id] );
    }
}
