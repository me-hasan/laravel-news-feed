<?php
 
 namespace Khayrulhasan\NewsApi;
 
class NewsChecker
{
 
    public function __construct(
        private Api $api
    ) {}
 
    public function latestArticle(): array
    {
        $response = $this->api->json();
        $items = $response['items']['items'] ?? [];
 
        if (empty($items)) {
            throw new \Exception("Unable to retrieve the latest article from Laravel-News.com");
        }
 
        usort($items, function($a, $b) {
            return strtotime($b['date_published']) - strtotime($a['date_published']);
        });
 
        return $items[0];
    }
}