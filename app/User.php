<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps()->withPivot('status','message');
    }

    public function jobs_unread(){
        return $this->jobs()->wherePivot('status','unread');
    }

    public function jobs_accept(){
        return $this->jobs()->wherePivot('status','accept');
    }

    public function jobs_reject(){
        return $this->jobs()->wherePivot('status','reject');
    }

    public function detail_users(){
        return $this->hasOne(Detail_user::class);
    }

    public function authorizeRoles($roles)
    {
        if(is_array($roles)){
            return $this->hasAnyRole($roles) || abort(401, 'this action is unauthorized');
        }
        return $this->hasRole($roles)||abort(401, 'this action is unauthorized');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
