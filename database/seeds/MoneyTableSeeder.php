<?php

use Illuminate\Database\Seeder;

class MoneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 50; $i++) {
            $walletId = factory(\App\Entity\Wallet::class)->create()->user_id;
            //количество валют для кошелька
            $count = random_int(1, 4);
            //Получаем все id валют
            $currenciesId = [];
            foreach (\App\Entity\Currency::all() as $currency) {
                $currenciesId[] = $currency->id;
            }
            //перемешиваем
            shuffle($currenciesId);

            //вырезаем случ. количество id валют
            $ids = array_slice($currenciesId, 0, $count);
            foreach ($ids as $id) {
                factory(\App\Entity\Money::class)->create(['currency_id' => $id, 'wallet_id' => $walletId]);

            }
        }




//            ->each(function ($money) use ($faker) {
//            $money->currency()->attach(\App\Entity\Currency::all()->random(1));
//            $money->wallet()->attach(\App\Entity\Wallet::all()->random(3));

//    });
    }

}