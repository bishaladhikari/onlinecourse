<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}