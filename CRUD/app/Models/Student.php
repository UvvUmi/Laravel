<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'address', 'phone', 'city_id', 'grupe_id',
        'asmens_kodas', 'gimimo_data',
     ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }


}
