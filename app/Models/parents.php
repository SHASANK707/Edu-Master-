<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class parents extends Model
{
    use HasFactory;
    protected $table = 'parent';
    protected $primaryKey = 'parent_id';

    protected $fillable = [
        'parent_id',
        'parent_name',
        'contact_number',
        'parent_email',
        'address',
        'relationship_to_student',
        // Ensure 'institute_id' is fillable if it's not already
        'institute_id',
    ];

    // Assuming each parent belongs to an institute
    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($parent) {
            // Fetch the institute ID for the parent
            // This assumes you have a way to determine the institute ID, adjust as necessary
            $instituteId = $parent->institute_id;

            // Define a role prefix for parents, adjust the prefix as per your requirements
            $rolePrefix = '04'; // Example: '05' for Parents

            // Fetch the last created parent_id, extract the numeric part, increment it, and prepend the institute and role prefixes
            $lastParent = self::where('parent_id', 'LIKE', $instituteId . $rolePrefix . '%')->latest('parent_id')->first();
            $lastId = $lastParent ? intval(substr($lastParent->parent_id, strlen($instituteId . $rolePrefix))) : 0;
            $parent->parent_id = $instituteId . $rolePrefix . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        });
    }
}
