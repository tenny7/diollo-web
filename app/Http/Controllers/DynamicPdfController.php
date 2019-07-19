<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Order;
use App\Models\Promotion;
use Illuminate\Http\Request;

class DynamicPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        // $details = [
        //     'users' => User::count(),
            // $orders = Order::count(),
            // $agents = Order::count(),
            // $vendors = Order::count(),
            // $promotion = Promotion::count(),
        // ];

        $data = [
                'title'                 => 'Passward Report',
                'users'                 =>  User::count(), 
                'agents'                =>  User::where('role',User::ROLE_AGENT)->count(), 
                'vendors'               =>  User::where('role',User::ROLE_VENDOR)->count(), 
                'orders'                =>  Order::count(), 
                'completedPromotion'    =>  Promotion::where('status',Promotion::STATUS_COMPLETED)->count(), 
                'activePromotion'       =>  Promotion::where('status',Promotion::STATUS_ACTIVE)->count(), 
            ];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('adminreport.pdf');
    }
}
