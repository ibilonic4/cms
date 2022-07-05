<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function roles(){

        return $this->belongsToMany(Role::class,'role_user');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_user');
    }


    public function userHasRole(... $role_names){

        
     foreach($this->roles as $role)
     {foreach($role_names as $role_name){
        if (Str::lower($role_name) == Str::lower($role->name)){return true;} }}
     return false;
    }

    public function setPasswordAttribute($value){
             $this->attributes['password'] = bcrypt($value);

    }

    public function getUserImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
     
        return asset('storage/' . $value);
        }





        public function userHasPermission(... $permission_names){

        
            foreach($this->roles as $role){
            foreach($role->permissions as $permission)
            {foreach($permission_names as $permission_name){
               if (Str::lower($permission_name) == Str::lower($permission->slug)){return true;} }}}
            return false;
           }

}
