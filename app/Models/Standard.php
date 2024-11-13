<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
        'discipline_id',
        'license_certificate',
        'state_department',
        'state_department_hyperlink',
        'type_of_license_certificate',
        'age_range',
        'degree_level_requirement',
        'licensure_specific_coursework',
        'licensure_require_fieldwork',
        'licensure_dependent_on_exam',
        'additional_req_part_c',
        'additional_req_schools',
        'additional_route_provisional_temp',
    ];
    
    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
