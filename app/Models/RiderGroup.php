<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'clubname',
    ];
}
