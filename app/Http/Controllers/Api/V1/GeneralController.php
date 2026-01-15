<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Enums\ReviewTypeEnums;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GeneralController extends Controller
{
    public function enums(): JsonResponse
    {
        $enums = [
            'review_types' => collect(ReviewTypeEnums::cases())
                ->mapWithKeys(fn ($case) => [$case->value => $case->getDescription()]),
        ];

        return response()->json($enums);
    }
}
