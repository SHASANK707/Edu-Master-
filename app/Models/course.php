<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_id',
        'user_id',
        'institude_id',
        'course_name',
        'created_at',
        'updated_at',
    ];
}
