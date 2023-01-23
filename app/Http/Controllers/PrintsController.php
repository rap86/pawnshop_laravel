<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CustomerLog;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\TransactionItem;
use App\Models\TransactionPayment;
use App\Models\Item;

class PrintsController extends Controller
{
    public function print_customer_log()
    {
        $data = CustomerLog::all();

        $filename = 'customer_log.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margein-left' => 10,
            'margin-right' => 10,
            'margin-top' => 15,
            'margin-bottom' => 20,
            'margin-header' => 10,
            'margin-footer' =>10,
            //'mode' => 'utf-8', 'format' => 'A4-L'
        ]);

        $html = \View::make('prints.edited_customer_name_log')->with('customer_logs', $data);
        $html = $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,"I");

    }

    public function print_granted($book_id, $status, $date_from, $date_to) {

        if(isset($book_id) && isset($status) && isset($date_from) && isset($date_to)) {
            
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
    
            //dd($transactions);

            $filename = 'granted_log.pdf';
            $mpdf = new \Mpdf\Mpdf([
                'margein-left' => 10,
                'margin-right' => 10,
                'margin-top' => 15,
                'margin-bottom' => 20,
                'margin-header' => 10,
                'margin-footer' =>10,
                'mode' => 'utf-8', 'format' => 'A4-L'
            ]);
    
            $html = \View::make('prints.print_granted')->with([
                'transactions'=> $transactions,
                'book_id' => $book_id,
                'status' => $status,
                'date_from' => $date_from,
                'date_to' => $date_to
            ]);
            $html = $html->render();
            $mpdf->WriteHTML($html);
            $mpdf->Output($filename,"I");

        }
        
    }

    public function print_transaction()
    {
        $filename = 'granted.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margein-left' => 10,
            'margin-right' => 10,
            'margin-top' => 15,
            'margin-bottom' => 20,
            'margin-header' => 10,
            'margin-footer' =>10,
            //'mode' => 'utf-8', 'format' => 'A4-L'
        ]);

        $html = \View::make('prints.print_transaction')->with([
            'transactions'=> '',
            'date_from' => '',
            'date_to' => '',
            'book_id' => ''
        ]);
        $html = $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename,"I");
    }
}
