<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The badges that belong to the user.
     *
     * @return void
     */
    public function badges()
    {
        return $this->belongsToMany(Badge::class);
    }

    /**
     * Get the books for the author.
     *
     * @return void
     */
    public function books()
    {
        return $this->hasMany(Book::class,'author_id','id');
    }
}
