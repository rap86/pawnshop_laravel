<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionPayment;
use App\Models\Transaction;
use App\Models\Book;
use App\Models\PtnumberLog;
use Illuminate\Support\Facades\DB;

class TransactionPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        /*
        $request->validate([
            'ptnumber' => 'required|unique:transaction_payments'
        ]);
        */

        $transaction_id = $request->input('transaction_id');
        $book_id = $request->input('book_id');
        $where[] = ['ptnumber', '=', $request->input('ptnumber')];

        $transaction_payments = TransactionPayment::with([
            
            'transaction'=>function($query) {
                $query->select([
                    'transactions.*'
                ]);
            }
        ])
        ->select([
            '*'
        ])
        ->where($where)
        ->get();

        if(count($transaction_payments) > 0)
        {
            return redirect()->route('transactions.show', $transaction_id)->with(
                'flash_failure', 'PT Number Already Exist!'
            );
        }

        TransactionPayment::create($request->except('book_id'));
        return redirect()->route('transactions.show', $transaction_id)->with(
            'flash_success', 'New PT Number Saved!'
        );
        
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
        $this->validate($request, [
            'status' => 'required'
        ]);

        $transaction_id = $request->input('transaction_id');
        $transaction_payment = TransactionPayment::find($id);
        $transaction_payment->update($request->all());

        return redirect()->route('transactions.show', $transaction_id)->with(
            'flash_success', 'Payment saved!'
        );

    }
    

    /*
     * Specific update method for ptnumber
     *
     */

    public function update_ptnumber(Request $request, $id)
    {
        
        $this->validate($request, [
            'ptnumber_new' => 'required',
            'details' => 'required',
        ]);

        if(!empty($request->input('ptnumber_old')))
        {
            
            $ptnumberInfo = TransactionPayment::find($id);
            $ptnumberInfo->ptnumber = $request->input('ptnumber_new');
            if($ptnumberInfo->save())
            {
                $request['transaction_payment_id'] = $id;
                PtnumberLog::create($request->all());
            }
        }

        return redirect()->route('transactions.show', $ptnumberInfo->transaction_id)->with(
            'flash_success', 'PT number updated!'
        );

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

    public function ptsearch(Request $request)
    {
        $where[] = ['branch_id', '=', 1 ];
        $ptnumber = $request->input('ptnumber');

        $transactions = Transaction::with([
            
            'transaction_payments' => function($query) use($ptnumber) {
				$query->select([
                    'transaction_payments.id',
                    'transaction_payments.transaction_id',
                    'transaction_payments.ptnumber',
                    'transaction_payments.payment_startdate',
                    DB::raw("DATEDIFF(now(), transaction_payments.payment_startdate)AS diff_days")
            ])->where('transaction_payments.ptnumber', '=', $ptnumber);
			},
            'customer'=>function($query) {
                $query->select([
                    'customers.id',
                    'customers.first_name',
                    'customers.middle_name',
                    'customers.last_name'
                ]);
            },
            'item'=>function($query) {
                $query->select([
                        'items.*'
                ]);
            }
        ])
        ->select([
            'transactions.*'
        ])
        ->where($where)
        ->get();
        //dd($transactions);
        return view('transaction_payments.ptsearch')->with([
            'transactions' => $transactions
        ]);
    }
    
}
