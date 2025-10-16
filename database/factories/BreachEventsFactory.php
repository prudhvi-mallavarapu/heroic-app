<?php

namespace Database\Factories;

use App\Models\BreachEvent;
use App\Models\Identity;
use App\Models\LeakedDataType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BreachEventsFactory extends Factory
{
    protected $model = BreachEvent::class;

    const defaultSources = [
        'Facebook',
        'Google',
        'Gmail',
        'Github',
        'Twitter',
        'Linkedin',
        'Dropbox',
        'GDrive'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identity_id' => Identity::inRandomOrder()->first()->id,
            'source' => $this->faker->randomElement(self::defaultSources),
            'reported_on' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'severity' => $this->faker->randomElement(['L', 'M', 'H', 'C']), //L:Low, M:Medium, H:High, C:Critical
            'status' => $this->faker->randomElement(['R', 'U']), //R:Resolved, U:Unresolved
            'endpoint' => $this->faker->url(),
            'details' => $this->faker->sentence()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (BreachEvent $breachEvent) {
            $leakedDataTypesIds = LeakedDataType::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $breachEvent->leakedDataTypes()->attach($leakedDataTypesIds);
        });
    }
}
