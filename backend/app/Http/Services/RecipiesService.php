<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Http;

class RecipiesService
{
    public function gerRecipies($params)
    {
        if (!$params) {
            return badRequest([
                'message' => 'Insert at least one ingredient.'
            ]);
        }
        $ingredients = explode(",", $params);
        if (count($ingredients) > 3) {
            return badRequest([
                'message' => 'Insert a maximum of 3 ingredients.'
            ]);
        }

        $response = Http::get('http://www.recipepuppy.com/api/?i=onions,garlic');

        if ($response->failed()) {
            serverError("Falha ao buscar buscar receiras");
        }

        $recipies = array_map(function ($recipe) {
            return [
                'title' => $recipe['title'],
                'ingredients' => $recipe['ingredients'],
                'link' => $recipe['href'],
                'gif' => $recipe['thumbnail'],
            ];
        }, $response->collect()['results'] ?? []);


        $data = [
            'keywords' => $ingredients,
            'recipies' => $recipies,
        ];

        return ok($data);
    }
}
