<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoArticle\CreateVideoArticleRequest;
use App\Http\Resources\VideoArticleResource;
use App\Services\Article\VideoArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VideoArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VideoArticleService $videoArticleService): AnonymousResourceCollection
    {
        $perPage = $request->query('per_page', '15');

        return VideoArticleResource::collection($videoArticleService->index($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVideoArticleRequest $request, VideoArticleService $videoArticleService): JsonResponse
    {
        $article = $videoArticleService->store($request);

        return response()->json(new VideoArticleResource($article));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, VideoArticleService $videoArticleService): JsonResponse
    {
        return response()->json(new VideoArticleResource($videoArticleService->show($id)));
    }
}
