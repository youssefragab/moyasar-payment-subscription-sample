<?php

namespace Modules\Plan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Plan\Models\Plan;
use Modules\Plan\Enums\StatusEnum;

class PlanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Plan::create([
            'name' => 'Basic',
            'months' => 1,
            'price' => 20,
            'status'   => StatusEnum::ACTIVE
        ]);

        Plan::create([
            'name' => 'Pro',
            'months' => 1,
            'price' => 40,
            'status'   => StatusEnum::ACTIVE
        ]);

        Plan::create([
            'name' => 'Advanced',
            'months' => 1,
            'price' => 60,
            'status'   => StatusEnum::ACTIVE
        ]);

    }
}
