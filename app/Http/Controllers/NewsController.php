<?php

namespace App\Http\Controllers;

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
    protected $news = [
        [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Новости культуры 1',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '1 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Новости культуры 2',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 3,
            'category_id' => 1,
            'title' => 'Новости культуры 3',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '3 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 4,
            'category_id' => 2,
            'title' => 'Автоновости 1',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 5,
            'category_id' => 2,
            'title' => 'Автоновости 2',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 6,
            'category_id' => 2,
            'title' => 'Автоновости 3',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '6 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 7,
            'category_id' => 3,
            'title' => 'Спорт 1',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 8,
            'category_id' => 3,
            'title' => 'Спорт 2',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
        [
            'id' => 9,
            'category_id' => 3,
            'title' => 'Спорт 3',
            'description' => 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam',
            'text' => '6 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Nec feugiat in fermentum posuere urna nec. Sollicitudin aliquam ultrices sagittis orci a scelerisque. Eget est lorem ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Urna nunc id cursus metus aliquam eleifend mi in'
        ],
    ];

    public function category()
    {
        return view('news.category', ['category' => $this->category]);
    }

    public function categoryId(int $id)
    {
       return view('news.category_id',[
           'id' => $id,
           'news' => $this->news
       ] );
    }

    public function newsId(int $id)
    {
        $news = 'Новость не найдена';
        foreach ($this->news as $n) {
            if ($n['id'] == $id) {
                $news = $n['text'];
                }
        }
        return view('news.news_id', ['news' => $news]);
    }
    public function newsAdd() {
        return view('news.add', ['category_id' => request()->get('category_id')]);
    }
}
