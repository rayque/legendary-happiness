<?php

namespace App\Http\Controllers;

use App\Http\Services\RecipiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipiesController extends Controller
{
    /**
     * @var RecipiesService
     */
    private $recipiesService;

    public function __construct(RecipiesService $recipiesService)
    {
        $this->recipiesService = $recipiesService;
    }

    public function getRecipes(Request $request): JsonResponse
    {
        $response = $this->recipiesService->getRecipes($request->i);
        return response()->json($response['data'], $response['status']);
    }
}
