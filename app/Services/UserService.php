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
        $id = $request->getId();
        $name = $request->getName();
        $email = $request->getEmail();
        if (!isset($id)) {
            $user = new User(['id' => $id, 'name' => $name, 'email' => $email]);
        } else {
            $user = $this->findById($id);
            $user->name = $name;
            $user->email = $email;
        }
        $user->save();
        return $user;
    }

    public function delete(int $id): void
    {
        $user = User::find($id);
        $user->delete();
    }


}