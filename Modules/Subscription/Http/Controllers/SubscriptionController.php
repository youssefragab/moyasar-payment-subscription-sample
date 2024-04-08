<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Services\SubscriptionService;

class SubscriptionController extends Controller
{

    public function create(Request $request, SubscriptionService $subscriptionService)
    {
        $user = auth()->user();

        $createPayment = $subscriptionService->createPayment($user,[
            'plan_id' => $request->plan_id,
            'payment_id' => $request->payment_id,
            'status' => 0
        ]);

        if(!$createPayment) {
            return response()->json([
                'success' => 'false',
                'message' => 'Subscription not created'
            ]);
        }

        return response()->json([
            'success' => 'true',
            'message' => 'Subscription created'
        ]);
    }

    public function verify(SubscriptionService $subscriptionService) {
        $user = auth()->user();

        $verifyPayment = $subscriptionService->verifyPayment($user,[
            'payment_id' => request()->id
        ]);

        return view("subscription::verify", ['status' => $verifyPayment ? 'success' : 'failed']);
    }
}
