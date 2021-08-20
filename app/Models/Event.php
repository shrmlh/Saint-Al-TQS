<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'theme', 
        'reg_start',
        'event_start', 
        'event_end', 
        'event_fee',
        'image',
        'event_status'
    ];
    
    public function eventstatus(){
        return $this->hasOne(EventStatus::class, 'stat_id', 'event_status');
    }
}
