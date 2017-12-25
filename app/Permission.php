<?php namespace App;

use Zizaco\Entrust\EntrustPermission;


class Permission extends EntrustPermission
{

    protected $table;

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}