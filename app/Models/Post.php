<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
        
    protected $table ='posts';
    protected $guarded = [
//prazan je tako da kao da sam stavio $fillable
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

   public function getPostImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
     
        return asset('storage/' . $value);
        }

// public function setPostImageAttribute($value){

//     $this->attributes['post_image']= asset($value);
// }
        
}
