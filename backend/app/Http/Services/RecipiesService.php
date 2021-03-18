<?php


namespace App\Http\Services;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecipiesService
{
    public function gerRecipies($params)
    {
        try {
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
                    'ingredients' =>  explode(",", $recipe['ingredients']) ,
                    'link' => $recipe['href'],
                    'gif' => $recipe['thumbnail'],
                ];
            }, $response->collect()['results'] ?? []);


            $data = [
                'keywords' => $ingredients,
                'recipies' => $recipies,
            ];

            return ok($data);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            return serverError("Falha ao buscar buscar receiras");
        }
    }
}
