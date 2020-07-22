<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\XmlParserService;

class ParserController extends Controller
{
    public function index() {
        $objService = new XmlParserService();
//        dd($objService->parse());
        $objService = new XmlParserService();
        foreach ($objService->parse()['item'] as $item) {
            News::create([
                'title' => mb_substr($item['title'], 0 , 48),
                'description' => mb_substr($item['description'], 0, 98),
                'text' => $item['description']
            ]);
        }
        echo 'Готово';
    }

}
