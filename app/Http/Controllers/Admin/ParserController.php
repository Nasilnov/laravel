<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\XmlParserService;
use App\Jobs\NewsParsing;
use Illuminate\Support\Facades\Redis;


class ParserController extends Controller
{
    public function index(XmlParserService $parserService)
    {
        $start = date('c');
        $rssLinks = [
//            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];

        foreach ($rssLinks as $link) {
//            $parserService->saveNews($link);
//            $redis = Redis::connection();
            NewsParsing::dispatch($link);
        }

        return $start. ' ' .date('c');

//        $objService = new XmlParserService();
//        foreach ($objService->parse()['item'] as $item) {
//            News::create([
//                'title' => mb_substr($item['title'], 0 , 48),
//                'description' => mb_substr($item['description'], 0, 98),
//                'text' => $item['description']
//            ]);
//        }
//        echo 'Готово';
//    }

    }
}
