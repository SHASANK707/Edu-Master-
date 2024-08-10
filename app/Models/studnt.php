<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studnt extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'student_id';
    // Make sure student_id is fillable if you're going to assign it manually
    protected $fillable = [
        'student_id',
        'class_id',
        'student_name',
        'dob',
        'gender',    
        'address',
        'parent_guardian_contact_info',
        'other_contact',
        'email_address'
    ];
    // In app/Models/studnt.php
    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }

    protected static function boot()
    {
        parent::boot();
    static::creating(function ($student) {
        // Fetch the institute related to this student
        $institute = $student->institute()->first();

        // Assuming the institute_id itself is the prefix you want to use
        $institutePrefix = $institute ? $institute->institute_id : 'UNKNOWN';

        // Define a role prefix based on some logic or condition
        // This is a placeholder, adjust according to your application's logic
        $rolePrefix = '03'; // Example: 'S' for Student, 'M' for Management, etc.

        // Fetch the last created student_id, extract the numeric part, increment it, and prepend the institute and role prefixes
        $lastStudent = self::where('student_id', 'LIKE', $institutePrefix . $rolePrefix . '%')->latest()->first();
        $lastId = $lastStudent ? intval(substr($lastStudent->student_id, strlen($institutePrefix . $rolePrefix))) : 0;
        $student->student_id = $institutePrefix . $rolePrefix . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);

   
          });
        
        }
    }
    
