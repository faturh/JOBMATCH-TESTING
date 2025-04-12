<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'company_name',
        'company_address',
        'website_address',
        'company_email',
        'company_phone_number',
        'position',
        'type_of_work',
        'location',
        'salary_min',
        'salary_max',
        'deadline',
        'job_description',
    ];

    /**
     * Relasi dengan tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
