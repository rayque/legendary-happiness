<?php


namespace App\Http\Api;


use Illuminate\Http\Client\Response;

class GiphyApi extends Api
{
    public function __construct()
    {
        parent::__construct(env('GIPHY_URL', ''));
    }

    public function getGifs($params = ''): Response
    {
        $params['api_key'] = env('GIPHY_KEY', '');
        return $this->get($params);
    }
}
