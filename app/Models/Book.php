<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * Get the authors that owns the book.
     *
     * @return void
     */
    public function authors()
    {
        return $this->belongsTo(Author::class,'author_id')->withDefault([
            'name' => 'No Books Found'
        ]);
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
