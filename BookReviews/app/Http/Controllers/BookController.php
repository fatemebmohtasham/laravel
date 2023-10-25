<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::when($title, fn ($query, $title) => $query->title($title));

        $books = match ($filter) {
            'popular_last_month'            =>  $books->popularLastMonth(),
            'popular_last_six_months'       =>  $books->popularLastSixMonths(),
            'highest_rated_last_month'      =>  $books->highestRatedLastMonth(),
            'highest_rated_last_six_months' =>  $books->highestRatedSixLastMonths(),
             default                        => $books->latest()->withAvgRating()->withReviewsCount(),
        };
        
        $books =  $books->get();
        return view('books.index', ['books' => $books]);

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
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
       
        $book = Book::with(['reviews' => fn($query) => 
        $query->latest()])->withAvgRating()->withReviewsCount()->findOrFail($id);
        return view('books.show', ['book' => $book ]);
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
