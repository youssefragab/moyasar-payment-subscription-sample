<?php 

namespace Modules\Subscription\Services;

use Modules\User\Models\User;
use Modules\Subscription\Services\Moyasar;

class SubscriptionService {

    public function createPayment(User $user, array $data)
    {
        $user->subscriptions()->create([
            'plan_id' => $data['plan_id'],
            'payment_id' => $data['payment_id'],
            'status' => 0
        ]);
        return true;
    }

    public function verifyPayment(User $user, array $data)
    {
        $moyasar = new Moyasar();
        $moyasar->setPaymentID($data['payment_id']);

        $payment = $moyasar->getPaymentInformation();

        if(!$payment || $payment->status != 'paid') {
            return false;
        }

        return $this->activateSubscription($user, $data['payment_id']);        
    }

    public function activateSubscription($user, $payment_id) {

        $subscription = $user->subscriptions()->where('payment_id', $payment_id)->first();

        $user->subscriptions()->where('payment_id', '!=',  $payment_id)->delete();
        
        if(!$subscription) { return false; }

        $subscription->update([
            'status' => 1,
            'start_date' => now(),
            'end_date' => now()->addMonths($subscription->plan->months)
        ]);

        return true;
    }

}