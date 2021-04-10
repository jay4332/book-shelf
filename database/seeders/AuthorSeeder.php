<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Badge;
use App\Models\Book;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Author::factory(5)
            ->hasAttached(
                Badge::factory()->count(3),
            )
            ->create();

        Author::factory(5)
            ->has(Book::factory()->count(2))
            ->create();
        
    }
}
