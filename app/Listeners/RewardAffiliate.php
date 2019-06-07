<?php

namespace App\Listeners;

use App\Models\ReferralLink;
use App\Events\VendorReferred;
use App\Models\ReferralRelationship;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RewardAffiliate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VendorReferred $event)
    {

        $referral = ReferralLink::find($event->referralId);
        if (!is_null($referral)) {
            ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);

            // Example...
            if ($referral->program->name === 'Sign-up Bonus') {
                // User who was sharing link
                $provider = $referral->user;
                $provider->addCredits(10000);
                // User who used the link
                // $user = $event->user;
                // $user->addCredits(20);
            }

        }



        // $referral = \App\ReferralLink::find($event->referralId);

        //     if (!is_null($referral)) {
        //         $provider = $referral->user;
        //         \App\ReferralRelationship::create([
        //             'referral_link_id' => $referral->id, 
        //             'user_id' => $event->user->id,
        //             'referree_user_id' =>  $provider->id,
        //             'reward'    => 'no'
        //             ]);
                
                // if ($referral->program->name === 'Referral System') 
                // {
                //    \App\Messages::create([
                //         'user_id' => $provider->id,
                //         'message' => ' The User you Reffered has Successfuly Registered on the system.'
                //     ]);
                // }

            // }
    }
}
