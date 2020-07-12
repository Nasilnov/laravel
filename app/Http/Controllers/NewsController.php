<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use App\Models\NewsToCategory;
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
//            'news' => News::query()->where('category_id', $id )->paginate(5),
//            'news' => News::paginate(5),
            'id' => $id
        ]);
    }

    public function newsId(int $id)
    {
        $news = News::query()->where('id', $id)->first();
        return view('news.news_id', ['news' => $news, 'id' => $id] );
    }

    public function newsEdit(int $id) {
        $news = News::query()->where('id', $id)->first();
        return view('news.edit', ['news' => $news] );
    }

    public function updateNews(CreateNewsRequest $request)
    {
        $id = $request->input('id');
        $news = News::find($id);
        $news->title =  $request->input('title');
        $news->description =  $request->input('description');
        $news->text =  $request->input('text');
        if (!$news->save()) {
            return back();
        }
        return view('news.edit', ['news' => News::query()->where('id', $id)->first(), 'id' => $request->input('id'), 'save' => '1']) ;
    }

    public function newsAdd(int $id) {
        $name = Category::query()->where('id', $id)->first()->name;
        return view('news.add', ['name' => $name, 'category_id' => $id] );
    }

    public function saveNews(CreateNewsRequest $request)
    {
//        dd($request);
        $data = [
          'category_id' => $request->input('category_id'),
          'title' => $request->input('title'),
          'desription' =>  $request->input('description'),
          'text' =>  $request->input('text')
        ];
          $id = News::create($data)->id;
          foreach ($request->input('category_id_m') as $cat) {
              $dataNewCat = [
                  'category_id' => $cat,
                  'news_id' => $id
                  ];
//              dd($dataNewCat);
              NewsToCategory::create($dataNewCat);
          }
          if (!isset($id)) {
              return back();
          }
        return view('news.edit', ['news' => News::query()->where('id', $id)->first()] );
    }
}
