<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{

    public function grantedUaInUaOut($status)
    {
        $where[] = ['status', '=', $status ];
        $where[] = ['branch_id', '=', 1 ];

        $transactions = Transaction::with([
            
            'transaction_payments' => function($query) {
				$query->select([
                    'transaction_payments.id',
                    'transaction_payments.transaction_id',
                    'transaction_payments.ptnumber',
                    'transaction_payments.payment_startdate',
                    DB::raw("DATEDIFF(now(), transaction_payments.payment_startdate)AS diff_days")
            ])->where('transaction_payments.paid', '=', 'no');
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
        /** 
         *  The day is already given.
         *  The value of $valueT->transaction_payments[ count($valueT->transaction_payments) -1 ]->diff_days is days from query on the top
         *  Now, we replaced the days value of 'Y'.$years.'-M'.$months.'-D'.$days;
         */

        foreach ($transactions as $keyT => $valueT) {

            if(isset($valueT->transaction_payments[0])) {

                $valueT->transaction_payments[ count($valueT->transaction_payments) -1 ]->diff_days = $this->convertToYearMonthDay($valueT->transaction_payments[ count($valueT->transaction_payments) -1 ]->diff_days);
            }
        }

        return $transactions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->grantedUaInUaOut('granted');

        return view('transactions.index')->with([
            'transactions' => $transactions,
            'nopttab' => 'visible'
        ]);
    }

    public function underauction()
    {
        $transactions = $this->grantedUaInUaOut('uain');

        return view('transactions.index')->with([
            'transactions' => $transactions,
            'nopttab' => 'notvisible'
        ]);
    }

    public function outside()
    {
        $transactions = $this->grantedUaInUaOut('uaout');

        return view('transactions.index')->with([
            'transactions' => $transactions,
            'nopttab' => 'notvisible'
        ]);
    }

    public function convertToYearMonthDay($sum) {
        $years  = floor($sum / 365);
        $months = floor(($sum - ($years * 365))/30.5);
        $days   = floor($sum - ($years * 365) - ($months * 30.5));
        return 'Y'.$years.'-M'.$months.'-D'.$days;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id)
    {
        $books = Book::all();
        $items = Item::where('active','=', 'yes')->get();
        $customer = Customer::find($customer_id);
        return view('transactions.create',[
            'customer'=> $customer,
            'items' => $items,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'gross_amount' => 'required'
        ]);

        // get the item array only
        $itemsArray = $request['data'];
        $request['net_amount_duplicate'] = $request['net_amount'];
        $request['user_id'] = Auth::user()->id;
        $transactionInfo = $request->except('data');

        /*
        * Check if item array of name is not empty
        */
        if(!is_null($itemsArray['Item'][1]['item_name'])) {

            $transaction_id = Transaction::create($transactionInfo)->id;

            foreach($itemsArray['Item'] as $key => $value) 
            {
                $value = implode(" ",$value);
    
                $transactionItem = new TransactionItem();
                $transactionItem->transaction_id = $transaction_id;
                $transactionItem->item_name = $value;
                $transactionItem->save();
            }
        } else {
            return redirect()->route('customers.show', $request->input('customer_id'))->with(
                'flash_failure', 'Item/Jewelry type must not empty!'
            );
        }

        return redirect()->route('transactions.show', $transaction_id)->with(
            'flash_success', 'New Transaction Saved!'
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
        $transactions = Transaction::with([
			'transaction_items',
            'transaction_payments' => function($query) {
                $query->select('transaction_payments.*')->with([

                    'ptnumber_logs' => function($query) {
                        $query->select('ptnumber_logs.*');
                    }
                    
                ]);
                
            },
			'customer'=>function($query) {
				$query->select([
						'customers.*'
				]);
			},
            'item'=>function($query) {
				$query->select([
						'items.*'
				]);
			},
            'user'=>function($query) {
                $query->select([
                    'users.*'
                ]);
            },
		])
		->where('id', $id)
		->get();
        
       //dd($transactions);
        return view('transactions.show', [
            'transactions' => $transactions[0]
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
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('flash_success', 'Transaction Deleted!');
    }

    public function granted(Request $request) {
        
        if(!empty($request->input('book_id'))  && !empty($request->input('status')) && !empty($request->input('date_from')) && !empty($request->input('date_to')) ) {
            
            $book_id = $request->input('book_id');
            $status = $request->input('status');
            $date_from = $request->input('date_from');
            $date_to = $request->input('date_to');

            $transactions = Transaction::with([
                'transaction_items',
                'transaction_payments' => function($query) {
                    $query->select([
                        'transaction_payments.id',
                        'transaction_payments.transaction_id',
                        'transaction_payments.ptnumber',
                        'transaction_payments.payment_startdate',
                        DB::raw("DATEDIFF(now(), transaction_payments.payment_startdate)AS diff_days")
                    ]);
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
            ->where('book_id', '=', $book_id)
            ->where('status', '=', $status)
            ->whereDate('created_at', '>=', $date_from)
            ->whereDate('created_at', '<=', $date_to)
			->get();
    
            // dd($transactions);

            return view('transactions.granted', [
                'transactions' => $transactions,
                'book_id' => $book_id,
                'status' => $status,
                'date_from' => $date_from,
                'date_to' => $date_to,
            ]);

        } else {
            return view('transactions.granted');
        }   
    }

    public function grantedDuplicate(Request $request) {
        
        if(!empty($request->input('date_from'))  && !empty($request->input('date_to')) && !empty($request->input('book_id'))) {
            
            $date_from = $request->input('date_from');
			$date_to = $request->input('date_to');
            $book_id = $request->input('book_id');
            $status = $request->input('status');

            $transactions = Transaction::with([
                'transaction_items',
                'transaction_payments' => function($query) {
                    $query->select([
                        'transaction_payments.id',
                        'transaction_payments.transaction_id',
                        'transaction_payments.ptnumber',
                        'transaction_payments.payment_startdate',
                        DB::raw("DATEDIFF(now(), transaction_payments.payment_startdate)AS diff_days")
                    ]);
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
            ->where('status', '=', 'granted')
            ->where('book_id', '=', $book_id)
			->whereDate('created_at', '>=', $date_from)
			->whereDate('created_at', '<=', $date_to)
			->get();
    
            // dd($transactions);

            return view('transactions.granted', [
                'transactions' => $transactions,
                'date_from' => $request->input('date_from'),
                'date_to' => $request->input('date_to'),
                'book_id' => $request->input('book_id')
            ]);

        } else {
            return view('transactions.granted', [
                'date_from' => date('Y-m-d'),
                'date_to' => date('Y-m-d')
            ]);
        }   
    }

    public function collected(Request $request) {
    
        if(!empty($request->input('status')) && !empty($request->input('book_id'))) {
            
            $where[] = ['status', '=', $request->input('status')];
            $where[] = ['book_id', '=', $request->input('book_id')];

            $from = $request->input('date_from');
			$to = $request->input('date_to');


            $transactions = Transaction::with([
                'customer'=>function($query) {
                    $query->select([
                            'customers.*'
                    ]);
                },
                'item'=>function($query) {
                    $query->select([
                            'items.*'
                    ]);
                }
            ])
            ->where($where)
            ->get();
    
            //dd($transactions);
            return view('transactions.collected', [
                'transactions' => $transactions,
                'status' => $request->input('status'),
                'book_id' => $request->input('book_id')
            ]);

        } else {
            return view('transactions.collected');
        }   
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function mergerecord(Request $request)
    {
        if(!empty($request->input('slave_id')) && !empty($request->input('master_id'))){
            $customer_id_slave = $request->input('slave_id');
            $customer_id_master = $request->input('master_id');
            
            $customer_transactions_slave = Transaction::where('customer_id', '=', $customer_id_slave)->get();
            if(count($customer_transactions_slave) > 0)
            {
                if(Transaction::where("customer_id", $customer_id_slave)->update(["customer_id" => $customer_id_master]))
                {
                    return redirect()->route('customers.show', $customer_id_master)->with('flash_success', 'Records has been merged.');
                }
            }
            
        } else {
            return redirect()->route('/')->with('flash_failure', 'Error, please contact your admin.');
        }
    }
}
