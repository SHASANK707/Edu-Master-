<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studenttimetable extends Model
{
    use HasFactory;
    protected $table='student_timetable';
    protected $primaryKey='stud_timetable';
}
