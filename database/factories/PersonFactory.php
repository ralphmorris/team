<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'position' => 'Chief Risk and Compliance Officer',
            'location' => 'Ireland',
            'languages' => 'English & German',
            'bio' => $this->faker->text,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        $defaultImage = Storage::get('team-member.png');

        return $this->afterMaking(function (Person $person) {
            //
        })->afterCreating(function (Person $person) use ($defaultImage) {
            $path = 'public/assets/' . $person->id . '/team-member.png';

            Storage::put($path, $defaultImage);

            $person->profile_photo = $path;
            $person->save();
        });
    }
}
