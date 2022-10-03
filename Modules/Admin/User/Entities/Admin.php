<?php

namespace Modules\Admin\User\Entities;

use Illuminate\Support\Facades\Hash;
use Modules\Admin\User\Entities\Job;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements JWTSubject
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
     * Get the Jobs that the current admin created
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'created_by');
    }
}
