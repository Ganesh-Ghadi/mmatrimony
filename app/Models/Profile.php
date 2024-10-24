<?php

namespace App\Models;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'mother_tongue',
        'native_place',
        'gender',
        'marital_status',
        'living_with',
        'blood_group',
        'height',
        'weight',
        'body_type',
        'complexion',
        'physical_abnormality',
        'spectacles',
        'lens',
        'eating_habits',
        'drinking_habits',
        'smoking_habits',
        'about_self',
        'img_1',
        'img_2',
        'img_3',
        'religion',
        'caste',
        'sub_caste',
        'gotra',
        'father_is_alive',
        'father_name',
        'father_occupation',
        'father_organization',
        'father_job_type',
        'mother_is_alive',
        'mother_name',
        'mother_occupation',
        'mother_organization',
        'mother_job_type',
        'number_of_brothers_married',
        'number_of_brothers_unmarried',
        'brother_resident_place',
        'number_of_sisters_married',
        'number_of_sisters_unmarried',
        'sister_resident_place',
        'about_parents',
        'date_of_birth',
        'birth_time',
        'birth_place',
        'highest_education',
        'education_in_detail',
        'additional_degree',
        'occupation',
        'organization',
        'designation',
        'job_location',
        'job_experience',
        'income',
        'currency',
        'country',
        'state',
        'city',
        'address_line_1',
        'address_line_2',
        'landmark',
        'pincode',
        'mobile',
        'landline',
        'email',
        'partner_min_age',
        'partner_max_age',
        'partner_min_height',
        'partner_max_height',
        'partner_income',
        'partner_currency',
        'want_to_see_patrika',
        'partner_sub_cast',
        'partner_eating_habbit',
        'partner_city_preference',
        'partner_education',
        'partner_education_specialization',
        'partner_job',
        'partner_business',
        'partner_foreign_resident',
        'available_tokens',
        'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profilePackages()
    {
        return $this
            ->belongsToMany(Package::class, 'profile_packages')
            ->withPivot('tokens_received', 'tokens_used', 'starts_at', 'expires_at');
    }

    public function favoriteProfiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_favorites', 'profile_id', 'favorite_profile_id');
    }
}
