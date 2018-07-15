<?php

use Illuminate\Database\Seeder;

//use Faker\Generator as Faker;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        factory(\App\Entity\Wallet::class, 50)->create()->each(function ($wallet) use ($faker) {
            $boolean = random_int(0, 1);
            $ids = range(1, 5);
            shuffle($ids);
            if ($boolean) {
                $sliced = array_splice($ids, 0, 2);
                $wallet->currency()->attach($sliced, ['amount' => $faker->numberBetween(50, 250)]);
            } else {
                $wallet->currency()->attach(array_rand($ids, 1), ['amount' => $faker->numberBetween(50, 250)]);
            }
        });
    }
}
