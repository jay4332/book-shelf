<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Show the books for all author.
     *
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authors = Author::with([
            'books'=> function ($query)
            {
                $query->orderByDesc('avg_rating');
                
            },
            'badges'
        ])->paginate(5);
        
        return view('book.index', ['authors'=>$authors]);
    }

    public function search(Request $request)
    {    
        // if($request->has('q'))
        if(1)
        {
            $search = $request->q;
            $authors = Author::
                // orWhere('name', 'LIKE', "%{$search}%")
                // ->orWhere('email', 'LIKE', "%{$search}%")
                with([
                'books'=> function ($query) use($search)
                {
                    $query->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('isbn', 'LIKE', "%{$search}%");
                },
                'badges'
            ])->paginate(5);
        
            // dd($authors);
            
            return view('book.show', ['authors'=>$authors]);
        }
        else
        {
            // dd($authors);
            // return $this->index();
        }
    }

    public static function getBooksName($books)
    {         
        $booksName = array();
        
        foreach($books as $book)
        {
            $booksName[] = $book->name;
        }                                  
        
        $results=implode(', ',$booksName);

        return $results;
    }
    
}
