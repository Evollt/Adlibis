<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\CreateReviewRequest;
use App\Http\Requests\Review\GetReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(GetReviewRequest $request, ReviewService $reviewService)
    {
        return $reviewService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateReviewRequest $request, ReviewService $reviewService)
    {
        $review = $reviewService->store($request->validated());

        return response()->json(new ReviewResource($review));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ReviewService $reviewService)
    {
        $review = $reviewService->show($id);

        return response()->json(new ReviewResource($review));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, string $id, ReviewService $reviewService)
    {
        $review = $reviewService->update($id, $request);

        return response()->json(new ReviewResource($review));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ReviewService $reviewService)
    {
        $reviewService->destroy($id);

        return response()->json([
            'message' => 'Комментарий успешно удалён',
            'status' => true,
        ]);
    }
}
