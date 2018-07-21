<?php

namespace App\Services;


use App\Entity\Currency;
use App\Entity\Wallet;
use App\Requests\CreateWalletRequest;
use Illuminate\Support\Collection;

class WalletService implements WalletServiceInterface
{

    public function findByUser(int $userId): ?Wallet
    {
        return Wallet::where('user_id',$userId)->first();
    }

    public function create(CreateWalletRequest $request): Wallet
    {
        $userId = $request->getUserId();
        $wallet = Wallet::where('user_id',$userId)->first();
        if($wallet !== null){
            throw new \LogicException;
        }
        $wallet = new Wallet;
        $wallet->user_id = $userId;
        $wallet->save();

        return $wallet;
    }

    public function findCurrencies(int $walletId): Collection
    {
       return Wallet::find($walletId)->currencies()->get();
    }
}