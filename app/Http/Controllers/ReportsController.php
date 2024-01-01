<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\TransactionItem;
use App\Models\TransactionPayment;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function report_granted(Request $request) {

       // dd($request);
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

            return view('reports.report_granted', [
                'transactions' => $transactions,
                'book_id' => $book_id,
                'status' => $status,
                'date_from' => $date_from,
                'date_to' => $date_to
            ]);

        } else {
            return view('reports.report_granted');
        }
    }

    public function report_collected(Request $request) {

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
            return view('reports.report_collected', [
                'transactions' => $transactions,
                'status' => $request->input('status'),
                'book_id' => $request->input('book_id')
            ]);

        } else {
            return view('reports.report_collected');
        }
    }
}
