<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'video_url' => $this->video_url,
            'full_video_url' => $this->getFullVideoUrl(),
        ];
    }

    public function getFullVideoUrl()
    {
        return config('app.url') . '/storage/' . $this->video_url;
    }
}
