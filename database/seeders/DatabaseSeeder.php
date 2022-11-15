<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    private $faker;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create();
         $this->faker = Faker::create();

         User::factory(200)->customer()->create()->each(function (User $user)  {
            Shop::create([
                    'user_id' => $user->id,
                    'name' => $this->faker->name(),
                    'domain' => $this->faker->domainWord(),
                    'address' => $this->faker->address(),
                ]);
         });
    }
}
