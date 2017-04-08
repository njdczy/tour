<?php

namespace App;

use App\Events\UserSaved;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

//    protected $events = [
//        'saved' => UserSaved::class,
//    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function children()
    {
        return $this->hasOne(child::class, 'user_id');
    }
}
