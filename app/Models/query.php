<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class query extends Model
{
    use HasFactory;

    protected $table='query';
    protected $fillable = ['id','user_id','subject','message','file','status'];


    public function user(){
        return $this->belongsTo(user::class, 'user_id');

    }

    public function query_docs(){
        return $this->hasMany(query_doc::class,'query_id');  
           
    }
}
