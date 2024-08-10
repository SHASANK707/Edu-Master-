<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\clsscontroller;

class clss extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $primaryKey = 'class_id';
}