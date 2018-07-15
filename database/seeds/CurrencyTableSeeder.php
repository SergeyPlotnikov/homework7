<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $currencies = ['Bitcoin', 'Ethereum', 'Litecoin', 'Mixin', 'Paypex', 'Enigma'];
//        foreach ($currencies as $currency) {
//            factory(\App\Entity\Currency::class)->create(['name'=>$currency]);
//        }
        factory(\App\Entity\Currency::class, 5)->create();
    }
}
