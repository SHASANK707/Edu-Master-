<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class communication extends Model
{
    use HasFactory;
    protected $table = 'communication';
    protected $primaryKey = 'communication_id';

    protected $fillable = [
        'communication_id',
        'staff_id',
        'message',
        'notification',
        'meeting_schedule'     
    ];
}