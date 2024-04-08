<?php
namespace Modules\User\Repositories;

use Modules\User\Models\User;
use Modules\User\Enums\StatusEnum;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function find(int $id)
    {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email)
    { 
        return User::where([['email', $email],['status', StatusEnum::ACTIVE]])->first();
    }

    public function all()
    {
        return User::all();
    }
}