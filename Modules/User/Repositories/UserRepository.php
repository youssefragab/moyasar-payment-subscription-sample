<?php
namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }

    public function find(int $id): User
    {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function all(): array
    {
        return User::all();
    }
}