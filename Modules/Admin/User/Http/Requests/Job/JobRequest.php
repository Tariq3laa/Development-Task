<?php

namespace Modules\Admin\User\Http\Requests\Job;

use Modules\Common\Http\Requests\ResponseShape;

class JobRequest extends ResponseShape
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['job'] =  $this->route('job');
        return $data;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'PUT': 
            case 'POST': {
                    return [
                        'name'          => 'required|min:2'
                    ];
                }
            case 'GET': 
            case 'DELETE': {
                    return [
                        'job'            => 'required|exists:jobs,id'
                    ];
                }
            default:
                break;
        }
    }
}
