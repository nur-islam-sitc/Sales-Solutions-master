<?php

namespace Database\Seeders;

use App\Models\MerchantInfo;
use App\Models\Role;
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

        User::factory(200)->customer()->create()->each(function (User $user) {
            Shop::query()->create([
                'user_id' => $user->id,
                'name' => $this->faker->name(),
                'domain' => $this->faker->domainWord(),
                'address' => $this->faker->address(),
            ]);

            MerchantInfo::query()->create([
                'user_id' => $user->id,
            ]);
        });

        User::factory(200)->staff()->create();


        $roles = [
            [
                'name' => 'Senior Quality Analyst',
                'slug' => 'senior-quality-analyst',
            ],
            [
                'name' => 'Senior Data Analyst',
                'slug' => 'senior-data-analyst',
            ],
            [
                'name' => 'Senior Web Developer',
                'slug' => 'senior-web-developer',
            ],
            [
                'name' => 'Inside Sales Head',
                'slug' => 'inside-sales-head',
            ],
            [
                'name' => 'Hub Manager',
                'slug' => 'hub-manager',
            ],
        ];

        foreach ($roles as $role) {
            Role::query()->create([
                'name' => $role['name'],
                'slug' => $role['slug'],
            ]);
        }
    }
}
