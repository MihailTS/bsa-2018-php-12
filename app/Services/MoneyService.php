<?php

namespace App\Services;

use App\Entity\Money;
use App\Requests\CreateMoneyRequest;

class MoneyService implements MoneyServiceInterface
{

    public function create(CreateMoneyRequest $request): Money
    {
        $money = new Money;
        $money->amount = $request->getAmount();
        $money->currency_id = $request->getCurrencyId();
        $money->wallet_id = $request->getWalletId();
        $money->save();

        return $money;
    }

    public function maxAmount(): float
    {
        return Money::max('amount');
    }
}