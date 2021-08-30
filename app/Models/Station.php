<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'event', 
        'assigned_user',
        'station', 
    ];

    public function eventmain(){
        return $this->belongsTo(Event::class, 'event','id');
    }

    public function assigneduser(){
        return $this->belongsTo(User::class, 'assigned_user','id');
    }
}
