<?php


namespace App\Http\Api;

class RecipePuppyApi extends Api
{
    public function __construct()
    {
        parent::__construct('http://www.recipepuppy.com/api/');
    }

    public function getRecipies($params = '')
    {
        return $this->get($params);
    }
}
