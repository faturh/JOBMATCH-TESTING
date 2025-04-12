<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'photo',
        'date_of_birth',
        'gender',
        'email',
        'phone_number',
        'address',
        'cv_file',
        'portfolio_file',
        'institution',
        'major',
        'graduation_year',
        'work_company',
        'work_position',
        'work_description',
        'soft_skills',
        'hard_skills',
        'certification',
        'desired_position',
        'type_of_work',
        'location',
        'salary_min',
        'salary_max',
        'availability_date',
        'available_now',
    ];

    /**
     * Relasi dengan tabel user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
