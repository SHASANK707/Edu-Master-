<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    // User.php
public function institutes() {
    return $this->hasMany(Institute::class);
}

// Institute.php
public function user() {
    return $this->belongsTo(User::class);
}

}
