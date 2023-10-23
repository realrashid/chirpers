<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\PlanCraft\Facades\PlanCraft;

class BillingController extends Controller
{
    public function billing()
    {
        // Step 1: Get the authenticated user
        $user = auth()->user();

        // Step 2: Fetch all available plans using PlanCraft
        $plans = PlanCraft::plans();

        // Step 3: Get the user's current subscription plan
        $subscription = $user->currentPlan();

        // Step 4: Get the user's default payment method
        $defaultPaymentMethod = $user->defaultPaymentMethod();

        // Step 5: Create a Setup Intent for setting up payment methods
        $intent = $user->createSetupIntent();

        // Step 6: Return the billing view with the necessary data
        return view('billing', compact('plans', 'subscription', 'defaultPaymentMethod', 'intent'));
    }

    public function subscribe(Request $request)
    {
        // Step 1: Retrieve the selected planKey and interval from the request
        $planKey = $request->planKey;
        $interval = $request->interval;

        // Step 2: Find the plan details based on the selected planKey
        $plan = PlanCraft::findPlan($planKey);

        // Step 3: Construct the planId parameter based on the selected interval
        if ($interval === 'Monthly') {
            $planId = $plan->planId['monthly'];
        } else {
            $planId = $plan->planId['yearly'];
        }

        // Step 4: Retrieve the authenticated user making the request
        $user = $request->user();

        // Step 5: Retrieve the payment token from the request
        $paymentMethod = $request->token;

        // Step 6: Create or retrieve the Stripe customer associated with the user
        $user->createOrGetStripeCustomer();

        // Step 7: Update the user's default payment method with the provided token
        $user->updateDefaultPaymentMethod($paymentMethod);

        // Step 8: Create a new subscription with the selected plan
        $subscription = $user->newSubscription('default', $planId)
            ->trialDays($plan->trialDays)
            ->create($paymentMethod, ['email' => $user->email]);

        // Step 9: Check if the subscription was successfully created in Stripe
        if ($subscription) {
            // Step 10: Create a PlanCraft plan and associate it with the user
            $user->createPlan($planKey);

            // Step 11: Redirect to the dashboard with a success message
            return redirect()->route('dashboard')->banner('You have subscribed successfully!');
        }

        // Step 12: If subscription creation failed, redirect back with an error message
        return redirect()->back()->dangerBanner('Something went wrong while subscribing. Please try again.');
    }

    public function switchSubscription(Request $request)
    {
        // Step 1: Get the authenticated user from the request
        $user = $request->user();

        // Step 2: Get the selected plan key and interval from the request
        $planKey = $request->planKey;
        $interval = $request->interval;

        // Step 3: Find the plan details based on the selected planKey
        $plan = PlanCraft::findPlan($planKey);

        // Step 4: Construct the planId parameter based on the selected interval
        if ($interval === 'Monthly') {
            $planId = $plan->planId['monthly'];
        } else {
            $planId = $plan->planId['yearly'];
        }

        // Step 5: Swap and invoice the user's subscription with the new plan
        $user->subscription('default')->swapAndInvoice($planId);

        // Step 6: For PlanCraft, switch the user's plan using the provided key
        $user->switchPlan($planKey);

        // Step 7: Redirect back with a success message
        return redirect()->back()->banner('Subscription switched successfully');
    }

    public function updatePaymentMethod(Request $request)
    {
        // Step 1: Get the authenticated user from the request
        $user = $request->user();

        // Step 2: Update the user's payment method using the Stripe token
        $user->updateDefaultPaymentMethod($request->token);

        // Step 3: Redirect back with a success message
        return redirect()->back()->banner('Payment method updated successfully.');
    }

    public function cancelSubscription(Request $request)
    {
        // Step 1: Get the authenticated user from the request
        $user = $request->user();

        // Step 2: Check if the user has an active subscription
        if ($user->hasActivePlan()) {

            // Step 3: Cancel the user's Stripe subscription
            $user->subscription('default')->cancelNow();

            // Step 4: Delete the associated PlanCraft plan
            $user->deletePlan();

            // Step 5: Check if the subscription was successfully cancelled
            if ($user->subscription('default')->canceled()) {
                // Step 6: Redirect back with a success message
                return redirect()->back()->banner('Subscription cancelled successfully.');
            }
        }

        // Step 7: If any of the steps above failed, redirect back with an error message
        return redirect()->back()->dangerBanner('Unable to cancel subscription.');
    }
}
