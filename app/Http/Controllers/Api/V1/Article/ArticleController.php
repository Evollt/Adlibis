<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\Article\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ArticleService $articleService)
    {
        $perPage = $request->query('per_page', '15');

        return ArticleResource::collection($articleService->index($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request, ArticleService $articleService)
    {
        $article = $articleService->store($request);

        return response()->json(new ArticleResource($article));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ArticleService $articleService)
    {
        return response()->json(new ArticleResource($articleService->show($id)));
    }
}
