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
        $authors = Author::with(['books','badges'])->paginate(5);
        
        return view('book.show', ['authors'=>$authors]);
    }
    
}
