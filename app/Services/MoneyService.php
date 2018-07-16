<?php

namespace App\Services;

use App\Entity\Money;
use App\Requests\CreateMoneyRequest;

class MoneyService implements MoneyServiceInterface
{
    public function create(CreateMoneyRequest $request): Money
    {
        $money = new Money(['currency_id' => $request->getCurrencyId(), 'wallet_id' => $request->getWalletId(),
            'amount' => $request->getAmount()]);
        $money->save();
        return $money;
    }

    public function maxAmount(): float
    {
        return Money::all()->max('amount');
    }

}