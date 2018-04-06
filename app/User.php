<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

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


    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function isRole($role)
    {
        return $this->roles()
                    ->where('name',$role)
                    ->count();
    }

    public function isAdmin(){
        foreach ($this->roles as $role) {
                 if($role->id == 1){
                     return true;
                 }
                 return false;
             }
     }
 
    

}
