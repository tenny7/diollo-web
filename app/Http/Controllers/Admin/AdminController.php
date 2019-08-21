<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Charts\CategoryCount;
use App\Charts\AdminOrderCount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // $user = Auth::user();
        
        $orders = DB::table('orders')
                ->select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                // ->where('user_id', '=', $user->id)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                ->get()->toArray();
                

        $months = range(1, 12);
        
        
        $month_values = [];

        foreach ($months as $month) {
            
            $month_values[$month] = 0;
            
        }

        foreach ($orders as $key => $value) {
            
            $month_values[$value->month] = $value->count;
        }

        $chart = new AdminOrderCount;
        $chart->labels(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);
        
        $chart->dataset('Orders', 'bar', collect(array_values($month_values)))->options([
            'color' => '#ff0000',
            'backgroundColor' => '#ff0066',
            'fill' => '#ff0066',
            'borderColor' => '',
            'borderWidth' => 1,
        ]);
        $wallet = Wallet::find(1);
        return view('admin.dashboard',compact('chart','wallet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
