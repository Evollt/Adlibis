<?php

declare(strict_types=1);

namespace App\Services\Article;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function index(string $perPage): LengthAwarePaginator
    {
        $articles = Article::paginate((int) $perPage);

        return $articles;
    }

    public function store(CreateArticleRequest $request): Article
    {
        $data = $request->validated();

        $article = Article::create([
            'title'       => $data['title'],
            'content'     => $data['content'],
        ]);

        return $article;
    }

    public function show(string $id): Article
    {
        $article = Article::findOrFail($id);

        return $article;
    }
}
