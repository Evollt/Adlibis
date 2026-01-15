<?php

declare(strict_types=1);

namespace App\Services\Article;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Models\Article;

class ArticleService
{
    public function index(string $perPage)
    {
        $articles = Article::paginate($perPage);

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
