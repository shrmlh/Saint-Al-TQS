<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFreebies extends Model
{
    use HasFactory;

    protected $fillable = [
        'event', 
        'freebie', 
    ];

    public function eventmain(){
        return $this->belongsTo(Event::class, 'event','id');
    }
}
