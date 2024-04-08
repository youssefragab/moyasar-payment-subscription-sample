<?php

namespace Modules\Plan\Repositories;

use Modules\Plan\Models\Plan;

class PlanRepository
{
    public function create(array $data)
    {
        return Plan::create($data);
    }

    public function update(Plan $plan, array $data)
    {
        $plan->update($data);
        return $plan;
    }

    public function delete(Plan $plan)
    {
        $plan->delete();
    }

    public function find(int $id)
    {
        return Plan::findOrFail($id);
    }

    public function all()
    {
        return Plan::all();
    }
}