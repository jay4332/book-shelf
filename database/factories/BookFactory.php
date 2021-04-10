<?php

namespace Database\Factories;

use App\Models\Book;
use FactoryClass;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'name' => $this->faker->name,
            'price'=> $this->faker->randomNumber(3, true),
            'isbn' => $this->faker->isbn13,
            'avg_rating' => $this->faker->randomDigitNotNull,
            'publish_date' => $this->faker->date,
        ];
    }
}
