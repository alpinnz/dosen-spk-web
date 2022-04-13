<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'c1' => $this->faker.random.number(1, 5),
            'c2' => $this->faker.random.number(1, 5),
            'c3' => $this->faker.random.number(1, 5),
            'c4' => $this->faker.random.number(1, 5),
            'c5' => $this->faker.random.number(1, 5),
        ];
    }
}
