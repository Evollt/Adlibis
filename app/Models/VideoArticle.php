<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $video_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VideoArticle whereVideoUrl($value)
 * @mixin \Eloquent
 */
class VideoArticle extends Model
{
    protected $fillable = [
        'video_url',
    ];
}
