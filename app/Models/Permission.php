<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function roles(){
$this->belongsToMany(Role::class,'permission_role');

    }

    public function users(){

        $this->belongsToMany(User::class,'permission_user');
    }
}
