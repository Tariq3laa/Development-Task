<?php

namespace Modules\Admin\User\Repositories;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use Modules\Admin\User\Entities\Job;
use Modules\Common\Helpers\Traits\ApiPaginator;
use Modules\Admin\User\Transformers\JobResource;

class JobRepository implements JobRepositoryInterface
{
    use ApiPaginator;

    public function index()
    {
        $data = app(Pipeline::class)
            ->send(Job::query())
            ->through([
                \Modules\Common\Filters\PaginationPipeline::class,
            ])
            ->thenReturn();
        $collection = JobResource::collection($data);
        return $this->getPaginatedResponse($data, $collection);
    }

    public function store($request)
    {
        DB::beginTransaction();
        $model = Job::query()->create($request->validated());
        DB::commit();
        return ['id' => $model->id];
    }

    public function show($request)
    {
        return new JobResource(Job::query()->find($request->job));
    }

    public function update($request)
    {
        DB::beginTransaction();
        $model = Job::query()->find($request->job);
        if(auth('admin')->id() != $model->created_by) throw new \Exception('Only the creator of the job can update the job.');
        $model->update($request->only(['name']));
        DB::commit();
        return 'Job updated successfully .';
    }

    public function destroy($request)
    {
        $model = Job::query()->find($request->job);
        if(auth('admin')->id() != $model->created_by) throw new \Exception('Only the creator of the job can delete the job.');
        $model->delete();
        return 'Job Deleted Successfully .';
    }
}