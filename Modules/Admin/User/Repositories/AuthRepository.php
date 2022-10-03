<?php

namespace Modules\Admin\User\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\User\Entities\Admin;
use Modules\Admin\User\Transformers\AdminResource;
use Modules\Admin\User\Repositories\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        $item = Admin::query()->where('email', $request->email)->first();
        if (!$item['access_token'] = Auth::guard('admin')->attempt($credentials, true)) throw new \Exception('The email or password you entered is invalid.', 401);
        return new AdminResource($item);
    }

    public function register($request)
    {
        DB::beginTransaction();
        Admin::query()->create($request->validated());
        DB::commit();
        return 'Account created successfully';
    }
}