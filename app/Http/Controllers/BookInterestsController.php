<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookInterest;

class BookInterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_interests = BookInterest::with([
            'book'=>function($query) {
                $query->select([
                    'books.*'
                ]);
            }
        ])->get();
        
        return view('book_interests.index')->with('book_interests', $book_interests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('book_interests.create')->with('books', $books);
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
            'book_id' => 'required',
            'month' => 'required',
            'percent_interest' => 'required',
            'display_order' => 'required',
            'details' => 'required'
        ]);

        BookInterest::create($request->all());
        return redirect()->route('book_interests.index')->with('flash_success', 'New Book Interest Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book_interest = BookInterest::find($id);
        return view('book_interests.show')->with('book_interest', $book_interest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books         = Book::all();
        $book_interest = BookInterest::find($id);

        return view('book_interests.edit')->with([
            'book_interest' => $book_interest,
            'books' => $books
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
            'book_id' => 'required',
            'month' => 'required',
            'percent_interest' => 'required',
            'display_order' => 'required',
            'details' => 'required'
        ]);
        
        $book_interest = BookInterest::find($id);
        $book_interest->update($request->all());
        return redirect()->route('book_interests.index')->with('flash_success', 'The book interest has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_interest =  BookInterest::find($id);
        $book_interest->delete();

        return redirect()->route('book_interests.index')->with('flash_success', 'Monthly Interest Deleted!');

    }
}
