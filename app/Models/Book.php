<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    /**
    * The relationships that should always be loaded.
    *
    * @var array
    */
    protected $with = ['authors'];

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
        return $this->belongsTo(Author::class,'author_id');
    }
}
