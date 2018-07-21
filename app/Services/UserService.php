<?php

namespace App\Services;


use App\Entity\User;
use App\Requests\SaveUserRequest;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{

    public function findAll(): Collection
    {
        return User::all();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function save(SaveUserRequest $request): User
    {
        $userId = $request->getId();
        if($userId !== null){
            $user = User::find($userId);
        }else{
            $user = new User;
            $user->name = $request->getName();
            $user->email = $request->getEmail();
            $user->save();
        }
        return $user;
    }

    public function delete(int $id): void
    {
        $user = User::find($id);
        $wallet = $user->wallet;
        if($wallet !== null){
            foreach($wallet->money as $money){
                $money->delete();
            }
            $wallet->delete();
        }
        $user->delete();
    }
}