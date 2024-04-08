<?php

namespace Modules\Plan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Plan\Repositories\PlanRepository;

class PlanController extends Controller
{

    protected $repository;

    public function __construct(PlanRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        $plans = $this->repository->all();
        return view('plan::index')->with(['plans' => $plans]);
    }


}
