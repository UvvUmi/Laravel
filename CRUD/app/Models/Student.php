<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'surname', 'address', 'phone', 'city_id', 'group_id', 'personal_number', 'birth_date', 'gender'];

    protected $dates = ['deleted_at'];

    // Susiejimas su miestu
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
