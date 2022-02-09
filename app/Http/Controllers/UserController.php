<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\NewAccessTokenResource;
use App\Models\User;

class UserController extends Controller {

    public function store(UserStoreRequest $request) {

        return User::query()->create($request->validated());
    }

    public function login(UserLoginRequest $request) {

        $login = auth()->validate($request->only('email', 'password'));

        if (!$login) {
            return abort(401, 'Unauthorized');
        }

        $userEmail = $request->input('email');

        return new NewAccessTokenResource(
            User::findByEmail($userEmail)->createToken($userEmail)
        );
    }
}
