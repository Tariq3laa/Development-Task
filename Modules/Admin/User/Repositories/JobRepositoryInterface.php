<?php

namespace Modules\Admin\User\Repositories;

interface JobRepositoryInterface 
{
    public function index();
    public function store($request);
    public function show($request);
    public function update($request);
    public function destroy($request);
}