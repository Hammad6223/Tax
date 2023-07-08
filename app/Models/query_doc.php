<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class query_doc extends Model
{
    
    use HasFactory;

    protected $table='query_doc';
    protected $fillable = ['id','query_id','file'];
}
