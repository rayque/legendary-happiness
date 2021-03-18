<?php


namespace App\Http\Api;


class GiphyApi extends Api
{
    protected $url = 'https://api.giphy.com/v1/gifs/search';

    public function __construct()
    {
        parent::__construct($this->url);
    }

    public function getGifs($params = '')
    {
        $params['api_key'] = 'E2GAhiJDQgjlwWX2vy7h72ob2WEbE2Wt';
        return $this->get($params);
    }
}
