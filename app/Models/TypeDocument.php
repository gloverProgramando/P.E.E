<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "typedocument";
    protected $primaryKey = "IdTypeDoc";
    
}
