<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * @var array 編集可能なカラム
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @var array hiddenカラム
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
