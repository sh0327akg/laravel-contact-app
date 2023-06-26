<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    protected $fillable = [
        'department_id',
        'name',
        'email',
        'content',
        'age',
        'gender',
    ];
}
