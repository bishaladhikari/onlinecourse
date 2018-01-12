<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Config;
//use Zizaco\Confide\ConfideUser;
//use Zizaco\Confide\ConfideUserInterface;


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;


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
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class, Config::get('entrust::assigned_roles_table'));
//    }
    public function deferAndAttachNewRole($role) {
        // remove any roles tagged in this user.
        foreach ($this->roles as $userRole) {
            $this->roles()->detach($userRole->id);
        }

        // attach the new role using the `EntrustUserTrait` `attachRole()`
        $this->attachRole($role);

    }
}
