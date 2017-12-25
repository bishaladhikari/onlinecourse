<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Config;
//use Zizaco\Confide\ConfideUser;
//use Zizaco\Confide\ConfideUserInterface;
//use Zizaco\Entrust\HasRole;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
//    use HasRole;

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
}
