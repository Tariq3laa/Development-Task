<?php

namespace Modules\Admin\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray($request)
    {
        $method = request()->route()->getActionMethod();
        $result = [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'created_jobs'      => JobResource::collection($this->jobs),
        ];
        if ($method == 'login') $result['access_token'] = $this->access_token;
        return $result;
    }
}
