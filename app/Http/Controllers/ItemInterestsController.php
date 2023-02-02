<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemInterest;

class ItemInterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_interests = ItemInterest::with([
            'item'=>function($query) {
                $query->select([
                        'items.*'
                ]);
            }
        ])->get();
        //dd($item_interests);

        return view('item_interests.index')->with('item_interests', $item_interests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('item_interests.create')->with('items', $items);
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
            'item_id' => 'required',
            'month' => 'required',
            'percent_interest' => 'required',
            'display_order' => 'required',
            'details' => 'required'
        ]);

        ItemInterest::create($request->all());
        return redirect()->route('item_interests.index')->with('flash_success', 'New Item Interest Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_interest = ItemInterest::find($id);
        return view('item_interests.show')->with('item_interest', $item_interest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items         = Item::all();
        $item_interest = ItemInterest::find($id);

        return view('item_interests.edit')->with([
            'item_interest' => $item_interest,
            'items' => $items
        ]);
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
            'item_id' => 'required',
            'month' => 'required',
            'percent_interest' => 'required',
            'display_order' => 'required',
            'details' => 'required'
        ]);
        
        $item_interest = ItemInterest::find($id);
        $item_interest->update($request->all());
        return redirect()->route('item_interests.index')->with('flash_success', 'The item interest has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_interest =  ItemInterest::find($id);
        $item_interest->delete();

        return redirect()->route('book_interests.index')->with('flash_success', 'Monthly Interest Deleted!');
    }
}
