<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institute';
    protected $primaryKey = 'institute_id';

    protected $fillable = [
        'institute_id',
        'institute_name',
        'address',
        'contact',
        'email',];
}
