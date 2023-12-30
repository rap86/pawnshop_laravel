<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerLog;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
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
        $customers = Customer::all();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if($request->image_name != "") {

            $request['image_name'] = $this->customerImageStorage($request->image_name);
        }

        $customer_id = Customer::create($request->all())->id;
        return redirect()->route('customers.show', $customer_id)->with('flash_success', 'Customer details saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::all();
        $customer_transactions = Customer::with([
            'transactions' => function($query) {
                $query->select('transactions.*')->with([

                    'transaction_payments' => function($query) {
                        $query->select('transaction_payments.*');
                    }

                ]);

            }
        ])
        ->where('id', $id)
        ->get();

        return view('customers.show')->with([
            'customer_transactions' => $customer_transactions,
            'items' => $items
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
        $customer = Customer::find($id);
        return view('customers.edit')->with('customer', $customer);
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
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $customer = Customer::find($id);
        $customerLogs['customer_logs']['customer_id'] =  $customer->id;
        $customerLogs['customer_logs']['old_first_name'] =  $customer->first_name;
        $customerLogs['customer_logs']['old_middle_name'] =  $customer->middle_name;
        $customerLogs['customer_logs']['old_last_name'] =  $customer->last_name;
        $customerLogs['customer_logs']['user_id'] =  Auth::user()->id;

		if($request->input('image_name') != "") {

			if(!is_null($customer->image_name) && Storage::disk('folder_customer')->exists($customer->image_name)) {

				Storage::disk('folder_customer')->delete($customer->image_name);
				$request['image_name'] = $this->customerImageStorage($request->input('image_name'));

			} else {

				$request['image_name'] = $this->customerImageStorage($request->input('image_name'));
			}

		} else {

			// pag hindi nag click ng button na "Take a Photo" hindi mababago ang image
			$request['image_name'] = $customer->image_name;
		}

		if($customer->update($request->all()))
        {
            (new CustomerLogsController)->store($customerLogs);

            return redirect()->route('customers.show', $id)->with('flash_success', 'Customer details updated!');
        } else {
            return redirect()->route('/', $id)->with('flash_failure', 'Update failed, contact the admin.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function customerImageStorage($customer_image_name)
	{
		$image = $customer_image_name; // your base64 encoded
		$image = str_replace('data:image/jpeg;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$imageName = date('Ymd').time().'.jpeg';

		Storage::disk('folder_customer')->put($imageName, base64_decode($image));

		return $imageName;
	}

    public function globalsearch($customer_lastname)
    {
        $customers = Customer::where('last_name', 'LIKE', '%'.$customer_lastname.'%')->orWhere('first_name', 'LIKE', '%'.$customer_lastname.'%')->get();
        return $customers;
    }

    public function search(Request $request)
    {

        $customers = $this->globalsearch($request->input('last_name'));
        return view('customers.index')->with('customers', $customers);
    }

    public function findcustomer(Request $request)
    {

        if(!empty($request->input('last_name')))
        {
            $findcustomer = $this->globalsearch($request->input('last_name'));
            return view('customers.findcustomer')->with([
                'findcustomer' => $findcustomer,
                'customer_id_slave' => $request->input('customer_id_slave')
            ]);

        } else {
            return view('customers.findcustomer')->with([
                'customer_id_slave' => $request->customer_id_slave
            ]);
        }

    }

    public function findpreview($slave_id, $master_id)
    {
        $customers = Customer::whereIn('id', array($slave_id, $master_id))->get();

        foreach($customers as $customer)
        {
            if($customer->id == $slave_id)
            {
                $infoArray['slave'][] =  $customer;
            }

            if($customer->id == $master_id)
            {
                $infoArray['master'][] =  $customer;
            }
        }

        return view('customers.findpreview')->with([
            'infoArray' => $infoArray,
            'customer_id_slave' => $slave_id,
            'customer_id_master' => $master_id
        ]);
    }

}
