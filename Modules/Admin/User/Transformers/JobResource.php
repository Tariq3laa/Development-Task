<?php

namespace Modules\Admin\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray($request)
    {
        switch ($request->route()->getActionMethod()) {
            case "index":
                $items = $this->getIndexData();
                break;
            case "show":
                $items = $this->getShowData();
                break;
            default:
                $items = $this->getDropDownData();
                break;
        }
        return $items;
    }

    private function getIndexData(): array
    {
        return  [
            'id'            => $this->id,
            'name'          => $this->name,
            'status'        => $this->status,
            'created_at'    => $this->created_at->format('Y-m-d h:i A'),
        ];
    }

    private function getShowData(): array
    {
        return  [
            'id'        => $this->id,
            'name'      => $this->name,
            'creator'   => [
                'id'    => $this->admin->id,
                'name'  => $this->admin->name
            ]
        ];
    }

    private function getDropDownData(): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name
        ];
    }
}
