<?php

namespace Modules\Website\User\Entities;

use Illuminate\Support\Facades\Hash;
use Modules\Admin\User\Entities\Job;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable implements JWTSubject
{
    protected $guarded = ['id'];
    protected $casts = ['status' => 'boolean'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value ? Hash::make($value) : $this->attributes['password'];
    }

    /**
     * Get the current client job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
