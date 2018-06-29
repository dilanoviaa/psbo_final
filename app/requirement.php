<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class requirement extends Model
{
    protected $fillable = [
        'gda',
        'semester',
        'deadline',
        'faculty', 
        'program', 
        'scholarship_id'
    ];

    public function scholarship()
    {
        $this->belongsTo(scholarship::class);
    }
}
