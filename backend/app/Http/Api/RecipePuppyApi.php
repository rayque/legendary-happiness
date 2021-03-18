<?php


namespace App\Http\Api;

class RecipePuppyApi extends Api
{
    public function __construct()
    {
        parent::__construct(env('RECIPEPUPPY_URL', ''));
    }

    public function getRecipes($params = ''): \Illuminate\Http\Client\Response
    {
        return $this->get($params);
    }
}
