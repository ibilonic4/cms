<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
//prazan je tako da kao da sam stavio $fillable
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
