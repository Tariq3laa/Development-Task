<?php

namespace Modules\Admin\User\Repositories;

interface AuthRepositoryInterface 
{
    public function login($request);
    public function register($request);
}