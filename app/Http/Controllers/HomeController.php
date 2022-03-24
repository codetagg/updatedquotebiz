<?php

namespace Acelle\Http\Controllers;

use Illuminate\Http\Request;
use Acelle\Model\Subscription;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        event(new \Acelle\Events\UserUpdated($request->user()->customer));

        // Last month
        $customer = $request->user()->customer;
        $sendingCreditsUsed = $customer->activeSubscription()->getCreditsUsedDuringPlanCycle('send'); // all time sending credits used
        $sendingCreditsLimit = $customer->activeSubscription()->getCreditsLimit('send');
        $sendingCreditsUsedPercentage = $customer->activeSubscription()->getCreditsUsedPercentageDuringPlanCycle('send');

        return view('dashboard', [
            'sendingCreditsUsed' => $sendingCreditsUsed,
            'sendingCreditsUsedPercentage' => $sendingCreditsUsedPercentage,
            'sendingCreditsLimit' => $sendingCreditsLimit,
        ]);
    }

    public function quotes(){
        return view('quotes');
    }

    public function support(){
        return view('support');
    }

    public function customers(){
        return view('customers');
    }

    public function serviceproviders(){
        return view('serviceproviders');
    }

    public function servicecategories(){
        return view('servicecategories');
    }

    public function supportchat(){
        return view('supportchat');
    }
}
