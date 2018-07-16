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
        factory(\App\Entity\Wallet::class, 50)->create()->each(function ($wallet) {
            $currenciesId = $this->getCurrenciesId();
            foreach ($currenciesId as $currencyId) {
                factory(\App\Entity\Money::class)->create(['currency_id' => $currencyId,
                    'wallet_id' => $wallet->id]);
            }
        });
    }

    private function getCurrenciesId():array
    {
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
        return array_slice($currenciesId, 0, $count);
    }

}