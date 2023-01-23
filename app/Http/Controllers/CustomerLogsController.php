<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLog;
use Illuminate\Support\Facades\Auth;

class CustomerLogsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_logs = CustomerLog::all();
        return view('customer_logs.index')->with([
            'customer_logs' => $customer_logs,
        ]);
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
    public function store($customerOldInfo)
    {

        $customerLogs = new CustomerLog();
        $customerLogs->customer_id      = $customerOldInfo['customer_logs']['customer_id'];
        $customerLogs->old_first_name   = $customerOldInfo['customer_logs']['old_first_name'];
        $customerLogs->old_middle_name  = $customerOldInfo['customer_logs']['old_middle_name'];
        $customerLogs->old_last_name    = $customerOldInfo['customer_logs']['old_last_name'];
        $customerLogs->user_id          = $customerOldInfo['customer_logs']['user_id'];
        $customerLogs->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer_logs = CustomerLog::where('customer_id', '=', $id)->get();
        return view('customer_logs.show')->with([
            'customer_logs' => $customer_logs,
        ]);
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
