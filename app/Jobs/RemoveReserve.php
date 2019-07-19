<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\ProductReserve;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RemoveReserve implements ShouldQueue
{
    protected $userReserve;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ProductReserve $userReserve)
    {
        $this->userReserve = $userReserve;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $product = ProductReserve::where('id', $this->userReserve->id)->where('expiry_date','>',\Carbon\Carbon::now())->delete();
    }
}
