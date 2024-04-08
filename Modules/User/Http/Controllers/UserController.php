<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;

class UserController extends Controller
{
    
    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('user::index');
    }

}
