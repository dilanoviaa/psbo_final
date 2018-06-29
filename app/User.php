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
        'name', 'email', 'password', 'nim', 'faculty','department', 'gda', 'semester', 'program','telephon', 'avatar'
    ];

    /**
     *   
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Method One to Many User->Comments
     */

    public function userComment()
    {
        return $this->hasMany(Comments::class);
    }
}
