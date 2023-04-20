<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail(),
            'phone'             => $this->faker->unique()->phoneNumber,
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'image'             => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'name'              => $this->faker->name,
                'email'             => $this->faker->unique()->safeEmail(),
                'phone'             => $this->faker->unique()->phoneNumber,
                'email_verified_at' => now(),
                'education'         => 'الثانوية',
                'password'          => bcrypt('password'),
                'image'             => null,
            ];
        });
    }

    public function teacher()
    {
        return $this->state(function (array $attributes) {
            return [
                'name'              => $this->faker->name,
                'email'             => $this->faker->unique()->safeEmail(),
                'phone'             => $this->faker->unique()->phoneNumber,
                'email_verified_at' => now(),
                'subject'           => 'اللغة العربية',
                'password'          => bcrypt('password'),
                'image'             => null,
            ];
        });
    }
}
