<?php

namespace Modules\Admin\User\Entities;

use Modules\Admin\User\Entities\Admin;
use Illuminate\Database\Eloquent\Model;
use Modules\Website\User\Entities\Client;

class Job extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['status' => 'boolean'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth('admin')->id();
        });
    }

    /**
     * Get the client that created the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    /**
     * Get the client that has the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
