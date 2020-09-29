<?php


namespace App\Rss;

use SimpleXMLElement;

class RssReader
{
    protected function getMyData() {
        $http = '';

        $simpleXML = new SimpleXMLElement($http);
        $result = $simpleXML->xpath('//item[position()<6]');

        $items = [];
        foreach ($result as $node) {
            $items[] = $node->asXML();
        }

        return $items;
    }
}