<?php

declare(strict_types=1);

namespace App\Services\Article;

use App\Http\Requests\VideoArticle\CreateVideoArticleRequest;
use App\Models\VideoArticle;
use Illuminate\Pagination\LengthAwarePaginator;

class VideoArticleService
{
    public function index(string $perPage): LengthAwarePaginator
    {
        $videoArticles = VideoArticle::paginate((int) $perPage);

        return $videoArticles;
    }

    public function store(CreateVideoArticleRequest $request): VideoArticle
    {
        $videoArticle = new VideoArticle;
        $file = $request->file('video');

        $path = $file->store('videos', 'public');
        $videoArticle->video_url = $path;

        $videoArticle->save();

        return $videoArticle;
    }

    public function show(string $id): VideoArticle
    {
        $videoArticle = VideoArticle::findOrFail($id);

        return $videoArticle;
    }
}
