<?php

namespace App\Console;

use App\Models\Product;
use App\Models\ProductReserve;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $productsReserves = ProductReserve::where('expiry_date','<',\Carbon\Carbon::now());
            foreach($productsReserves as $productsReserve)
            {
                $product = Product::find($productsReserves->product_id);
                $product->qty += $productsReserves->qty;
                $product->save();
            }
        })->everyMinute();
       
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
