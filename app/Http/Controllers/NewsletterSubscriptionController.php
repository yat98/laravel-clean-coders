<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\NewsletterSubscriptionService;

class NewsletterSubscriptionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $service = resolve(NewsletterSubscriptionService::class);
        $service->handle($request->email);

        return response()->json(['success' => true]);
    }
}
