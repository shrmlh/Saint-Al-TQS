<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    use HasFactory;
    
    protected $table = 'registrar';

    protected $fillable = [
        'queue_no', 
        'transaction',
        'status', 
        'serving_time',
        'employee_id'
    ];
}
