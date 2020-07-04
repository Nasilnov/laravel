<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $category = [
        [
          'id' => 1,
          'name' => 'Новости культуры'
        ] ,
        [
            'id' => 2,
            'name' => 'Автомобили'
        ],
        [
            'id' => 3,
            'name' => 'Спорт'
        ],
        [
            'id' => 4,
            'name' => 'Криптовалюта'
        ],
        [
            'id' => 5,
            'name' => 'Выборы'
        ]
    ];


    public function category()
    {
        return view('news.category', ['category' => $this->category]);
    }

    public function categoryId(int $id)
    {
       $newsArr = include storage_path('app/public/news.php');
//       dd($newsArr);
       return view('news.category_id',[
           'id' => $id,
           'news' => $newsArr
       ] );
    }

    public function newsId(int $id)
    {
        $newsArr = include storage_path('app/public/news.php');
        return view('news.news_id', ['news' => $newsArr[$id], 'id' => $id] );
    }

    public function newsEdit(int $id) {
        $newsArr = include storage_path('app/public/news.php');
        $news = $newsArr[$id] ?? [];
        if (!$news) {
            return abort(404);
        }
        return view('news.edit', ['news' => $news, 'id' => $id] );
    }

    public function updateNews(CreateNewsRequest $request)
    {

        $newsArr = include storage_path('app/public/news.php');

                $id = $request->input('id');
                $newsArr[$id]['title'] = $request->input('title');
                $newsArr[$id]['description'] = $request->input('description');
                $newsArr[$id]['text'] = $request->input('text');

        $string = "<?php\n return ".var_export($newsArr, true).';';
        file_put_contents(storage_path('app/public/news.php'),  $string);

        return view('news.edit', ['news' => $newsArr[$id], 'id' => $id, 'save' => '1']) ;
    }

    public function newsAdd(int $id) {
        $name = '';
        foreach ($this->category as $n) {
            if ($n['id'] == $id) {
                $name = $n['name'];
            }
        }
        return view('news.add', ['name' => $name, 'category_id' => $id] );
    }

    public function saveNews(CreateNewsRequest $request)
    {

        $newsArr = include storage_path('app/public/news.php');


        $newsArr[] =  [
            'category_id' => $request->input('category_id'),
            'title'=> $request->input('title'),
            'description' => $request->input('description'),
            'text' => $request->input('text')
            ];

        $string = "<?php\n return ".var_export($newsArr, true).';';
        file_put_contents(storage_path('app/public/news.php'),  $string);

        return view('news.edit', ['news' => $newsArr[count($newsArr) - 1], 'id' => count($newsArr) - 1, 'save' => '1']) ;
    }

}
