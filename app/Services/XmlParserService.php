<?php


namespace App\Services;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class XmlParserService
{

    public function saveNews($link)
    {
        $xml = XmlParser::load($link);
        $parse = $xml->parse([
            'item'       => [
                'uses'       => 'channel.item[title,description]'
            ],
        ]);
        $fileName = sprintf('Logs%s.txt', time() . rand(0, 10000));
        Storage::disk('publicLogs')->put($fileName, $link);

        foreach ($parse['item'] as $item) {
            News::create([
                'title' => mb_substr($item['title'], 0 , 48),
                'description' => mb_substr($item['description'], 0, 98),
                'text' => $item['description']
            ]);
        }

    }

}
