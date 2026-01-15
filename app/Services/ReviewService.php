<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\ReviewTypeEnums;
use App\Http\Requests\Review\CreateReviewRequest;
use App\Http\Requests\Review\GetReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    private $map = [
        ReviewTypeEnums::ARTICLE->value => \App\Models\Article::class,
        ReviewTypeEnums::VIDEO_ARTICLE->value => \App\Models\VideoArticle::class,
        ReviewTypeEnums::USER->value => \App\Models\User::class,
    ];

    public function index(GetReviewRequest $request)
    {
        $type = $request->query('reviewable_type');
        $id = $request->query('reviewable_id');

        if (!isset($this->map[(int) $type])) {
            abort(422, 'Недопустимый тип сущности');
        }

        $perPage = (int) $request->query('per_page', '15');

        $query = Review::where('reviewable_type', $this->map[(int) $type])
            ->where('reviewable_id', $id)
            ->latest();

        $paginated = $query->paginate($perPage)->withQueryString();

        return ReviewResource::collection($paginated);
    }

    public function store(CreateReviewRequest $request)
    {
        $data = $request->validated();

        if (!isset($this->map[$data['reviewable_type']])) {
            abort(422, 'Недопустимый тип сущности');
        }

        $parentId = $data['parent_id'] ?? null;

        if ($parentId) {
            $parentReview = $this->show($parentId);

            $parentId = $parentReview->parent_id ?: $parentReview->id;
        }

        $review = Review::create([
            'reviewer_id'     => Auth::id(),
            'reviewable_type' => $this->map[$data['reviewable_type']],
            'reviewable_id'   => $data['reviewable_id'],
            'comment'         => $data['comment'],
            'parent_id'       => $parentId,
        ]);

        return $review;
    }

    public function show(string $id): Review
    {
        $review = Review::with([
            'reviewer',
        ])->findOrFail($id);

        return $review;
    }

    public function update(string $id, UpdateReviewRequest $request): Review
    {
        $review = $this->show($id);

        if ($review->reviewer_id !== Auth::id()) {
            abort(403, 'Вы не можете редактировать этот комментарий.');
        }

        $review->update($request->validated());

        return $review;
    }

    public function destroy(string $id): array
    {
        $review = $this->show($id);

        if ($review->reviewer_id !== Auth::id()) {
            abort(403, 'Вы не можете удалить этот комментарий.');
        }

        $review->delete();

        return [
            'status' => true,
        ];
    }
}
