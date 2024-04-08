<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;
use Hash;

class UserController extends Controller
{

    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function login(Request $request)
    {
        $user = $this->repository->findByEmail($request->email);

        if(!$user) {
            return response()->json([
                'success' => 'false',
                'message' => 'Invalid credentials'
            ]);
        }

        if(Hash::check($request->password, $user->password)) {
            auth()->login($user);
            return response()->json([
                'success' => 'true',
                'user'    => $user
            ]);
        }

        return response()->json([
            'success' => 'false',
            'message' => 'Invalid credentials'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }

}
