<?php

namespace App\Listeners;

use Exception;
use App\Models\Commitment;
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
        // dd($referral);
        if (!is_null($referral)) {
            ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);

            // Example...
            if ($referral->program->name === 'Affiliate link') {
                // User who was sharing link
                $provider = $referral->user;
                
                $payment_info = Commitment::where('user_id', $event->user->id)->first();
                try
                {
                    $affiliate_commission = $payment_info->amount * 0.2;
                    $provider->addCredits($affiliate_commission);
                }
                catch(Exception $e)
                {
                    dd($e);
                }
                    
                
                
                
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
