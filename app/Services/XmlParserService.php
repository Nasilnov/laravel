<?php


namespace App\Services;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParserService
{
    public function parse()
    {
        $xml = XmlParser::load('https://news.yandex.ru/army.rss');
        $parse = $xml->parse([
                'item'       => [
                    'uses'       => 'channel.item[title,description]'
                ],
            ]);
        return $parse;
    }

}
