<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // password hash if needed
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    // Relationship with Role; User roles
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function post() {
        return $this->hasMany('App\Post');
    }

    public function isAdmin(){
        if ($this->role->name == 'Administrator'  && $this->is_active == 1){
            return true;
        }
        return false;
    }

//    public function userId(){
//        return $this->id;
//    }
//
//    public function hasRole() {
//        $categories = Category::all();
//        foreach ($categories as $category){
//            if ($this->role->name == $category->name && $this->is_active == 1){
//                return true;
//            }
//        }
//        return false;
//    }
}
