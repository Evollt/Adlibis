<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideoArticle>
 */
class VideoArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'video_url' => 'https://packaged-media.redd.it/y4ghzmivt0ce1/pb/m2-res_1920p.mp4?m=DASHPlaylist.mpd&v=1&e=1768532400&s=d83de8b2c67b5bdec3a50e608e4dd2566f485144',
        ];
    }
}
