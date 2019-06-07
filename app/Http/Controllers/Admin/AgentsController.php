<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('role',User::ROLE_AGENT)->get();
        return view('admin.agents.all', compact('agents'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applications()
    {
        return view('admin.agents.applications');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suspended()
    {
        $agents = User::where('status',User::STATUS_SUSPENDED)->get();
        return view('admin.agents.suspended',compact('agents'));
    }

    public function viewStores($agent_id)
    {
        $agents = User::where('role',User::ROLE_AGENT)->get();
        $stores =  Store::where('agent_id', $agent_id)->get();
        return view('admin.agents.stores',compact('stores','agents'));
    }

    public function suspendAgent($agent_id)
    {
        $agent = User::find($agent_id);
        
        if($agent)
        {
            $agent->status = User::STATUS_SUSPENDED;
            if($agent->save())
            {
                return redirect()->back()->with(['success' => 'Agent suspended']);
            } 
        }
        else
        {
            return redirect()->back()->with(['error' => 'Could not find agent']);
           
        }
        
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
