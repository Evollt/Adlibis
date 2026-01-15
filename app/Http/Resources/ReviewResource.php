<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'reviewer' => new UserResource($this->reviewer),
            'reviewable_type' => $this->reviewable_type,
            'reviewable_id' => (int) $this->reviewable_id,
            'comment' => $this->comment,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
        ];
    }
}
