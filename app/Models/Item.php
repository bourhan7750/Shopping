<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',
        'price',
        'amount',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
