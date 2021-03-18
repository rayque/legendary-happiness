<?php


namespace App\Http\Api;

class RecipePuppyApi extends Api
{
    protected $url = 'http://www.recipepuppy.com/api/';

    public function __construct()
    {
        parent::__construct($this->url);
    }

    public function getRecipies($params = '')
    {
        return $this->get($params);
    }
}
