<?php

namespace App\Services;

use App\Entity\User;
use App\Entity\Wallet;
use App\Requests\CreateWalletRequest;
use Illuminate\Support\Collection;

class WalletService implements WalletServiceInterface
{



    public function findByUser(int $userId): ?Wallet
    {
        $user = User::find($userId);
        if ($user !== null) {
            return $user->wallet;
        } else {
            return null;
        }
    }

    public function create(CreateWalletRequest $request): Wallet
    {
        $userId = $request->getUserId();
        $wallet = $this->findByUser($userId);
        if (!isset($wallet)) {
            $wallet = new Wallet(['user_id' => $userId]);
            $wallet->save();
        } else {
            throw new \LogicException("The table can't hold more than 1 record with the same user_id");
        }
        return $wallet;
    }

    public function findCurrencies(int $walletId): Collection
    {
        $currencies = Wallet::find($walletId)->currency;
        return $currencies;
    }

}