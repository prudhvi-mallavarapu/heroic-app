<?php

namespace Database\Factories;

use App\Models\Identity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IdentityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Identity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Default State
        return [
            'name' => fake()->unique()->domainName(), //Domain Name
            'type' => 'D' //'D' => Domain
        ];
    }

    public function domain(): static
    {
        return $this->state(fn() => [
            'name' => fake()->unique()->domainName(),
            'type' => 'D' //Domain type
        ]);
    }

    public function individual(): static
    {
        return $this->state(fn() => [
            'name' => fake()->unique()->safeEmail(),
            'type' => 'I' //Individual type
        ]);
    }
}
