<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff_information';
    protected $primaryKey = 'staff_id';
    protected $fillable = ['staff_id', /* other fillable attributes */];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($staff) {
            // Fetch the institute ID from the authenticated user
            $instituteId = Auth::user()->institute_id;
            // Define a role prefix based on some logic or condition
            $rolePrefix = '01'; // Example: 'STAFF' for staff members

            // Fetch the last created staff_id, extract the numeric part, increment it, and prepend the institute and role prefixes
            $lastStaff = self::where('staff_id', 'LIKE', $instituteId . $rolePrefix . '%')->latest('staff_id')->first();
            $lastId = $lastStaff ? intval(substr($lastStaff->staff_id, strlen($instituteId . $rolePrefix))) : 0;
            $staff->staff_id = $instituteId . $rolePrefix . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        });
    }
}
