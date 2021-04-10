<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Show the author for all books.
     *
     * 
     * @return \Illuminate\View\View
     */

    // public function index()
    // {
    //     $books = Book::with('authors')->orderBy('avg_rating')->paginate(5);
        
    //     return view('book.index', ['authors'=>$books]);
    // }

    public function index(Request $request){    
        if($request->has('q'))
        {
            $para = $request->q;
            $books = Book::with([
                'authors' => function ($query) use($para)
                {
                    $query->where('name','like','%'.$para.'%')
                    ->orWhere('email','like','%'.$para.'%');
                    
                },
            ])->get();
        }
        else
        {
            $books = Book::with('authors')->orderBy('avg_rating')->paginate(5);
        }
        
        return view('book.index', ['authors'=>$books]);
    }
}
