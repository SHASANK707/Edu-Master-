<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Faculty extends Model
{
    use HasFactory;
    
    // Specify the table associated with the model
    protected $table = 'faculty_info';

    // Specify the primary key for the model
    protected $primaryKey = 'faculty_id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'faculty_id',
        'faculty_name',
        'faculty_age',
        'faculty_dob',
        'faculty_gender',
        'faculty_contact',
        'faculty_address',
        'faculty_email',
        'faculty_qualification',
        'faculty_doj',
        'faculty_specializations',
        'faculty_experience',
        'faculty_designation',
        'faculty_department',
    ];

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($faculty) {
            // Fetch the institute ID for the faculty
            // This assumes you have a way to determine the institute ID, adjust as necessary
            $instituteId = Auth::user()->institute_id; // Example, adjust based on your application logic

            // Define a role prefix for faculty members, adjust the prefix as per your requirements
            $rolePrefix = '02'; // Example: '02' for Faculty

            // Fetch the last created faculty_id, extract the numeric part, increment it, and prepend the institute and role prefixes
            $lastFaculty = self::where('faculty_id', 'LIKE', $instituteId . $rolePrefix . '%')->latest('faculty_id')->first();
            $lastId = $lastFaculty ? intval(substr($lastFaculty->faculty_id, strlen($instituteId . $rolePrefix))) : 0;
            $faculty->faculty_id = $instituteId . $rolePrefix . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        });
    }
}
