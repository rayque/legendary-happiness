<?php


namespace App\Http\Api;


class GiphyApi extends Api
{
    public function __construct()
    {
        parent::__construct(env('GIPHY_URL', ''));
    }

    public function getGifs($params = '')
    {
        $params['api_key'] = env('GIPHY_KEY', '');
        return $this->get($params);
    }
}
