<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'location',
        'adress',
        'available_spots',
        'date',
        'time',
        'description',
        'image',
        'category_id',
        'max_spots',
        'tickets_sold',
        'revenue'
    ];
}
