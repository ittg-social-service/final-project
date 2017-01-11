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
        'nc','name','first_lastname','second_lastname','email','phone','password',
        'avatar',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function student()
    {
        return $this->hasOne('App\Student');
    }
    public function tutor()
    {
      return $this->hasOne('App\Tutor');
    }
    public function department_manager()
    {
      return $this->hasOne('App\DepartmentManager');
    }
    public function coordinator()
    {
      return $this->hasOne('App\Coordinator');
    }
    public function career()
    {
      return $this->belongsTo('App\Career');
    }
}
