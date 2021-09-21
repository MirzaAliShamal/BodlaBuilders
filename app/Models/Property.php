<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
        'subtype',
        'image',
        'name',
        'floor',
        'downpayment',
        'possession',
        'amount',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
