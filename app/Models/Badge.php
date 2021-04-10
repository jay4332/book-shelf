<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The authors that belong to the badge.
     *
     * @return void
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
