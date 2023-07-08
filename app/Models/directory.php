<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directory extends Model
{
    use HasFactory;

    protected $table='directory';
    protected $fillable = ['id','user_id','name'];


    public function directory_docs(){
        
        return $this->hasMany(document::class,'directory_id');    
    }
}
