<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Modules\User\Enums\StatusEnum;
class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Model::unguard();

        User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('12345678'),
            'status'   => StatusEnum::ACTIVE
        ]);

    }
}
