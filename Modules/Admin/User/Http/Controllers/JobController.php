<?php

namespace Modules\Admin\User\Http\Controllers;

use Modules\Admin\User\Services\JobService;
use Modules\Admin\User\Http\Requests\Job\JobRequest;

class JobController
{
    private $service;

    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(JobRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(JobRequest $request)
    {
        return $this->service->show($request);
    }

    public function update(JobRequest $request)
    {
        return $this->service->update($request);
    }

    public function destroy(JobRequest $request)
    {
        return $this->service->destroy($request);
    }
}
