<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ReviewTypeEnums;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    private static $map = [
        ReviewTypeEnums::ARTICLE->value => \App\Models\Article::class,
        ReviewTypeEnums::VIDEO_ARTICLE->value => \App\Models\VideoArticle::class,
        ReviewTypeEnums::USER->value => \App\Models\User::class,
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reviewable_type' => $this->faker->randomElement(array_values(self::$map)),
            'reviewable_id' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->text(100),
            'reviewer_id' => 1,
        ];
    }
}
